<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Illuminate\Http\Request;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upazilas = Upazila::with('district')->get();
        return response()->json([
            'success' => true,
            'message' => 'Upazilas retrieved successfully',
            'count' => $upazilas->count(),
            'data' => $upazilas,
        ], 200);
    }

    //TODO : create a new upazila
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:upazilas,name',
            'order' => 'required|integer|min:0',
            'district_id' => 'required|exists:districts,id',
        ]);

        $upazila = Upazila::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Upazila created successfully',
            'data' => $upazila,
        ], 201);
    }

    //TODO : single upazila by id
    public function show($id)
    {
        $upazila = Upazila::with('district')->find($id);

        if (!$upazila) {
            return response()->json([
                'success' => false,
                'message' => 'Upazila not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Upazila retrieved successfully',
            'data' => $upazila,
        ], 200);
    }

    //PUT/PATCH: Update a specific upazila by ID
    public function update(Request $request, $id)
    {
        $upazila = Upazila::find($id);

        if (!$upazila) {
            return response()->json([
                'success' => false,
                'message' => 'Upazila not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:upazilas,name,' . $id,
            'order' => 'required|integer|min:0',
            'district_id' => 'required|exists:districts,id',
        ]);

        $upazila->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Upazila updated successfully',
            'data' => $upazila,
        ], 200);
    }


   //DELETE: Delete a specific upazila by ID
    public function destroy($id)
    {
        $upazila = Upazila::find($id);

        if (!$upazila) {
            return response()->json([
                'success' => false,
                'message' => 'Upazila not found',
            ], 404);
        }

        $upazila->delete();

        return response()->json([
            'success' => true,
            'message' => 'Upazila deleted successfully',
        ], 200);
    }

    //Get all upazilas by district ID
    public function getUpazilasByDistrict($districtId)
    {
        $upazilas = Upazila::where('district_id', $districtId)->get();

        return response()->json([
            'success' => true,
            'message' => 'Upazilas retrieved successfully',
            'count' => $upazilas->count(),
            'data' => $upazilas,
        ], 200);
    }
}
