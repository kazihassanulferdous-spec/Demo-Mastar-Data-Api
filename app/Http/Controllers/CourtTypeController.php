<?php

namespace App\Http\Controllers;

use App\Models\CourtType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourtTypeController extends Controller
{
    // GET: All court types
    public function index(): JsonResponse
    {
        $courtTypes = CourtType::orderBy('order')->get();

        return response()->json([
            'success' => true,
            'message' => 'Court types retrieved successfully',
            'count' => $courtTypes->count(),
            'data' => $courtTypes,
        ], 200);
    }

    // POST: Create court type
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'name_bn' => 'required|string|max:100',
            'order' => 'required|integer|min:0',
        ]);

        $courtType = CourtType::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Court type created successfully',
            'data' => $courtType,
        ], 201);
    }

    // GET: Single court type
    public function show(string $id): JsonResponse
    {
        $courtType = CourtType::find($id);

        if (!$courtType) {
            return response()->json([
                'success' => false,
                'message' => 'Court type not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Court type retrieved successfully',
            'data' => $courtType,
        ], 200);
    }

    // PUT/PATCH: Update court type
    public function update(Request $request, string $id): JsonResponse
    {
        $courtType = CourtType::find($id);

        if (!$courtType) {
            return response()->json([
                'success' => false,
                'message' => 'Court type not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'name_bn' => 'sometimes|required|string|max:100',
            'order' => 'sometimes|required|integer|min:0',
        ]);

        $courtType->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Court type updated successfully',
            'data' => $courtType,
        ], 200);
    }

    // DELETE: Court type
    public function destroy(string $id): JsonResponse
    {
        $courtType = CourtType::find($id);

        if (!$courtType) {
            return response()->json([
                'success' => false,
                'message' => 'Court type not found',
            ], 404);
        }

        $courtType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Court type deleted successfully',
        ], 200);
    }
}