<?php

namespace App\Http\Controllers;

use App\Models\DisputeType;
use Illuminate\Http\Request;

class DisputeTypeController extends Controller
{
    // GET: All dispute types
    public function index()
    {
        $disputeTypes = DisputeType::all();

        return response()->json([
            'success' => true,
            'message' => 'Dispute types retrieved successfully',
            'count' => $disputeTypes->count(),
            'data' => $disputeTypes
        ], 200);
    }

    // POST: Create dispute type
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'name_bn' => 'required|string|max:100',
        'order' => 'required|integer|min:0',
    ]);

    $disputeType = DisputeType::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'Dispute type created successfully',
        'data' => $disputeType
    ], 201);
}

    // GET: Dispute type by ID
    public function show($id)
    {
        $disputeType = DisputeType::find($id);

        if (!$disputeType) {
            return response()->json([
                'success' => false,
                'message' => 'Dispute type not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $disputeType
        ], 200);
    }

    // PUT: Update dispute type
    public function update(Request $request, $id)
    {
        $disputeType = DisputeType::find($id);

        if (!$disputeType) {
            return response()->json([
                'success' => false,
                'message' => 'Dispute type not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'order' => 'sometimes|required|integer|min:0'
        ]);

        $disputeType->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Dispute type updated successfully',
            'data' => $disputeType
        ], 200);
    }

    // DELETE: Dispute type
    public function destroy($id)
    {
        $disputeType = DisputeType::find($id);

        if (!$disputeType) {
            return response()->json([
                'success' => false,
                'message' => 'Dispute type not found'
            ], 404);
        }

        $disputeType->delete();

        return response()->json([
            'success' => true,
            'message' => 'Dispute type deleted successfully'
        ], 200);
    }
}