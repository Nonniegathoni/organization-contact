<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of contacts with pagination.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Contact::with('organization')
            ->when($request->status !== 'all', function ($q) use ($request) {
                $q->where('is_active', $request->status !== 'inactive');
            })
            ->when($request->organization_id, function ($q) use ($request) {
                $q->where('organization_id', $request->organization_id);
            })
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->where('first_name', 'like', '%' . $request->search . '%')
                          ->orWhere('last_name', 'like', '%' . $request->search . '%')
                          ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })
            ->orderBy('is_primary_contact', 'desc')
            ->orderBy('first_name');

        $contacts = $query->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }

    /**
     * Store a newly created contact.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'job_title' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:50',
            'is_primary_contact' => 'boolean',
            'notes' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'office_phone_number' => 'nullable|string|max:50',
            'mobile_phone_number' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ]);

        DB::beginTransaction();
        try {
            // If this is set as primary contact, unset others for this organization
            if ($validated['is_primary_contact'] ?? false) {
                Contact::where('organization_id', $validated['organization_id'])
                    ->where('is_primary_contact', true)
                    ->update(['is_primary_contact' => false]);
            }

            $contact = Contact::create($validated);
            $contact->load('organization');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Contact created successfully',
                'data' => $contact
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error creating contact'
            ], 500);
        }
    }

    /**
     * Display the specified contact.
     */
    public function show(Contact $contact): JsonResponse
    {
        $contact->load('organization');

        return response()->json([
            'success' => true,
            'data' => $contact
        ]);
    }

    /**
     * Update the specified contact.
     */
    public function update(Request $request, Contact $contact): JsonResponse
    {
        $validated = $request->validate([
            'organization_id' => 'required|exists:organizations,id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'job_title' => 'nullable|string|max:100',
            'department' => 'nullable|string|max:50',
            'is_primary_contact' => 'boolean',
            'notes' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'office_phone_number' => 'nullable|string|max:50',
            'mobile_phone_number' => 'nullable|string|max:50',
            'is_active' => 'boolean'
        ]);

        DB::beginTransaction();
        try {
            // If this is set as primary contact, unset others for this organization
            if ($validated['is_primary_contact'] ?? false) {
                Contact::where('organization_id', $validated['organization_id'])
                    ->where('id', '!=', $contact->id)
                    ->where('is_primary_contact', true)
                    ->update(['is_primary_contact' => false]);
            }

            $contact->update($validated);
            $contact->load('organization');

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Contact updated successfully',
                'data' => $contact
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error updating contact'
            ], 500);
        }
    }

    /**
     * Remove the specified contact.
     */
    public function destroy(Contact $contact): JsonResponse
    {
        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully'
        ]);
    }

    /**
     * Set a contact as primary for their organization.
     */
    public function setPrimary(Contact $contact): JsonResponse
    {
        DB::beginTransaction();
        try {
            // Unset current primary contact for this organization
            Contact::where('organization_id', $contact->organization_id)
                ->where('is_primary_contact', true)
                ->update(['is_primary_contact' => false]);

            // Set this contact as primary
            $contact->update(['is_primary_contact' => true]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Primary contact updated successfully',
                'data' => $contact
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'message' => 'Error updating primary contact'
            ], 500);
        }
    }

    /**
     * Search contacts.
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('q');
        
        $contacts = Contact::with('organization')
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('first_name', 'like', '%' . $query . '%')
                  ->orWhere('last_name', 'like', '%' . $query . '%')
                  ->orWhere('email', 'like', '%' . $query . '%');
            })
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }

    /**
     * Export contacts to CSV.
     */
    public function export(): JsonResponse
    {
        $contacts = Contact::with('organization')
            ->where('is_active', true)
            ->get(['id', 'organization_id', 'first_name', 'last_name', 'email', 'office_phone_number', 'mobile_phone_number'])
            ->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'organization' => $contact->organization->name ?? '',
                    'name' => $contact->first_name . ' ' . $contact->last_name,
                    'email' => $contact->email,
                    'office_phone' => $contact->office_phone_number,
                    'mobile_phone' => $contact->mobile_phone_number
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }
}