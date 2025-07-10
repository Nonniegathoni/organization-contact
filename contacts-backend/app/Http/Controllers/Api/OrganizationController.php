<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    /**
     * Display a listing of organizations with pagination.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Organization::with('industry')
            ->when($request->status !== 'all', function ($q) use ($request) {
                $q->where('is_active', $request->status !== 'inactive');
            })
            ->when($request->industry_id, function ($q) use ($request) {
                $q->where('industry_id', $request->industry_id);
            })
            ->when($request->search, function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('name');

        $organizations = $query->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $organizations
        ]);
    }

    /**
     * Store a newly created organization.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'industry_id' => 'required|exists:industries,id',
            'website' => 'nullable|url|max:100',
            'logo_url' => 'nullable|url|max:255',
            'founded_date' => 'nullable|date',
            'tax_id' => 'nullable|string|max:30',
            'is_active' => 'boolean'
        ]);

        $organization = Organization::create($validated);
        $organization->load('industry');

        return response()->json([
            'success' => true,
            'message' => 'Organization created successfully',
            'data' => $organization
        ], 201);
    }

    /**
     * Display the specified organization.
     */
    public function show(Organization $organization): JsonResponse
    {
        $organization->load(['industry', 'contacts']);

        return response()->json([
            'success' => true,
            'data' => $organization
        ]);
    }

    /**
     * Update the specified organization.
     */
    public function update(Request $request, Organization $organization): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'industry_id' => 'required|exists:industries,id',
            'website' => 'nullable|url|max:100',
            'logo_url' => 'nullable|url|max:255',
            'founded_date' => 'nullable|date',
            'tax_id' => 'nullable|string|max:30',
            'is_active' => 'boolean'
        ]);

        $organization->update($validated);
        $organization->load('industry');

        return response()->json([
            'success' => true,
            'message' => 'Organization updated successfully',
            'data' => $organization
        ]);
    }

    /**
     * Remove the specified organization.
     */
    public function destroy(Organization $organization): JsonResponse
    {
        $organization->delete();

        return response()->json([
            'success' => true,
            'message' => 'Organization deleted successfully'
        ]);
    }

    /**
     * Get contacts for a specific organization.
     */
    public function contacts(Organization $organization): JsonResponse
    {
        $contacts = $organization->contacts()
            ->where('is_active', true)
            ->orderBy('is_primary_contact', 'desc')
            ->orderBy('first_name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }

    /**
     * Search organizations.
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('q');
        
        $organizations = Organization::with('industry')
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                  ->orWhereHas('industry', function ($industryQuery) use ($query) {
                      $industryQuery->where('name', 'like', '%' . $query . '%');
                  });
            })
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $organizations
        ]);
    }

    /**
     * Export organizations to CSV.
     */
    public function export(): JsonResponse
    {
        $organizations = Organization::with('industry')
            ->where('is_active', true)
            ->get(['id', 'name', 'industry_id', 'website', 'tax_id'])
            ->map(function ($org) {
                return [
                    'id' => $org->id,
                    'name' => $org->name,
                    'industry' => $org->industry->name ?? '',
                    'website' => $org->website,
                    'tax_id' => $org->tax_id
                ];
            });

        return response()->json([
            'success' => true,
            'data' => $organizations
        ]);
    }
}