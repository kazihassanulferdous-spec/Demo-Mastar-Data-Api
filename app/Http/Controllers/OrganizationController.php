<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::with(['division', 'district'])->get();
        return response()->json([
            'success' => true,
            'message' => 'Organizations retrieved successfully',
            'count' => $organizations->count(),
            'data' => $organizations,
        ], 200);
    }

     //TODO: create a new organization
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:organizations,name',
            'order' => 'required|integer|min:0',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        $organization = Organization::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Organization created successfully',
            'data' => $organization,
        ], 201);
    }

    //TODO: single organization by id
    public function show($id)
    {
        $organization = Organization::with(['division', 'district'])->find($id);

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Organization not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Organization retrieved successfully',
            'data' => $organization,
        ], 200);
    }

    //PUT/PATCH: Update organization
    public function update(Request $request, $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Organization not found',
            ], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:organizations,name,' . $organization->id,
            'order' => 'required|integer|min:0',
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
        ]);

        $organization->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Organization updated successfully',
            'data' => $organization,
        ], 200);
    }

    //DELETE: Remove organization
    public function destroy($id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json([
                'success' => false,
                'message' => 'Organization not found',
            ], 404);
        }

        $organization->delete();

        return response()->json([
            'success' => true,
            'message' => 'Organization deleted successfully',
        ], 200);
    }
}
