<?php

namespace App\Http\Controllers;

use App\Models\CourtType;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Court;

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CourtController extends Controller
{
    // GET: All court types
    public function index()
    {
        $courts = Court::all();

        return response()->json([
            'success' => true,
            'message' => 'Courts retrieved successfully',
            'count' => $courts->count(),
            'data' => $courts
        ], 200);
    }

    // POST: Create court
public function store(Request $request): JsonResponse
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'name_bn' => 'required|string|max:100',
        'status' => 'sometimes|boolean',
        'court_type_id' => 'required|integer|exists:court_types,id',
        'division_id' => 'required|integer|exists:divisions,id',
        'district_id' => 'required|integer|exists:districts,id',
    ]);


        $court = Court::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Court created successfully',
            'data' => $court,
        ], 201);
    }

    // GET: Single court
    public function show(string $id): JsonResponse
    {
        $court = Court::find($id);

        if (!$court) {
            return response()->json([
                'success' => false,
                'message' => 'Court not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Court retrieved successfully',
            'data' => $court,
        ], 200);
    }

    // PUT/PATCH: Update court
    public function update(Request $request, string $id): JsonResponse
    {
        $court = Court::find($id);

        if (!$court) {
            return response()->json([
                'success' => false,
                'message' => 'Court not found',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'name_bn' => 'required|string|max:100',
            'status' => 'sometimes|boolean',
            'court_type_id' => 'required|integer|exists:court_types,id',
            'division_id' => 'required|integer|exists:divisions,id',
            'district_id' => 'required|integer|exists:districts,id',
        ]);

        $court->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Court updated successfully',
            'data' => $court,
        ], 200);
    }

    // DELETE: Court
    public function destroy(string $id): JsonResponse
    {
        $court = Court::find($id);

        if (!$court) {
            return response()->json([
                'success' => false,
                'message' => 'Court not found',
            ], 404);
        }

        $court->delete();

        return response()->json([
            'success' => true,
            'message' => 'Court deleted successfully',
        ], 200);
    }
}