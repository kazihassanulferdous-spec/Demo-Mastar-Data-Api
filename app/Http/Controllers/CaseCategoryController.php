<?php

namespace App\Http\Controllers;

use App\Models\CaseCategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CaseCategoryController extends Controller
{
    // GET: All case categories
public function index()
{
    $caseCategories = CaseCategory::all();

    return response()->json([
        'success' => true,
        'message' => 'Case categories retrieved successfully',
        'count' => $caseCategories->count(),
        'data' => $caseCategories,
    ], 200);
}

    // POST: Create a case category
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'name_bn' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
        ]);

        $caseCategory = CaseCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Case category created successfully',
            'data' => $caseCategory,
        ], 201);
    }

    // GET: Single case category
    public function show(string $id): JsonResponse
    {
        $caseCategory = CaseCategory::find($id);

        if (!$caseCategory) {
            return response()->json([
                'success' => false,
                'message' => 'Case category not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Case category retrieved successfully',
            'data' => $caseCategory,
        ], 200);
    }

    // PUT/PATCH: Update a case category
    public function update(Request $request, string $id): JsonResponse
    {
        $caseCategory = CaseCategory::find($id);

        if (!$caseCategory) {
            return response()->json([
                'success' => false,
                'message' => 'Case category not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'name_bn' => 'sometimes|required|string|max:100',
            'order' => 'sometimes|required|integer|min:0',
        ]);

        $caseCategory->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Case category updated successfully',
            'data' => $caseCategory,
        ], 200);
    }

    // DELETE: Remove a case category
    public function destroy(string $id): JsonResponse
    {
        $caseCategory = CaseCategory::find($id);

        if (!$caseCategory) {
            return response()->json([
                'success' => false,
                'message' => 'Case category not found',
            ], 404);
        }

        $caseCategory->delete();

        return response()->json([
            'success' => true,
            'message' => 'Case category deleted successfully',
        ], 200);
    }
}