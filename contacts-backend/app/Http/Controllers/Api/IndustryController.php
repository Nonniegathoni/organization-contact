<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IndustryController extends Controller
{
    /**
     * Display a listing of active industries.
     */
    public function index(): JsonResponse
    {
        $industries = Industry::where('is_active', true)
            ->orderBy('name')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $industries
        ]);
    }

    /**
     * Store a newly created industry.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:industries',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $industry = Industry::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Industry created successfully',
            'data' => $industry
        ], 201);
    }

    /**
     * Display the specified industry.
     */
    public function show(Industry $industry): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $industry
        ]);
    }

    /**
     * Update the specified industry.
     */
    public function update(Request $request, Industry $industry): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50|unique:industries,name,' . $industry->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $industry->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Industry updated successfully',
            'data' => $industry
        ]);
    }

    /**
     * Remove the specified industry.
     */
    public function destroy(Industry $industry): JsonResponse
    {
        // Check if industry has organizations
        if ($industry->organizations()->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'Cannot delete industry with associated organizations'
            ], 422);
        }

        $industry->delete();

        return response()->json([
            'success' => true,
            'message' => 'Industry deleted successfully'
        ]);
    }
}