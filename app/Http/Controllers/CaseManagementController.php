<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use App\Models\CaseManagement;


class CaseManagementController extends Controller
{
    // GET: All cases
        public function index(): JsonResponse
    {
        $cases = CaseManagement::with(['division'])->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Cases retrieved successfully',
            'count' => $cases->count(),
            'data' => $cases,
        ], 200);
    }
        //Post : Create a new case
        public function create()
    {
        $validatedData = request()->validate([
            'trade_union_name' => 'required|string|max:255',
            'case_issue_date' => 'required|date',
            'case_no_writ_petition_no' => 'required|string|max:255',
            'trade_union_address' => 'required|string|max:255',
            'division_id' => 'required|integer|exists:divisions,id',
            'district_id' => 'required|integer|exists:districts,id',
            'police_station_id' => 'required|integer|exists:police_stations,id',
            'court_type_id' => 'required|integer|exists:court_types,id',
            'court_id' => 'required|integer|exists:courts,id',
            'case_category_id' => 'required|integer|exists:case_categories,id',
            'case_sub_category_id' => 'nullable|integer|exists:case_categories,id',
            'case_subject' => 'required|string|max:255',
            'background_of_case_file' => 'nullable|string',

            'defendant_name' => 'required|string|max:255',
            'defendant_division_id' => 'required|integer|exists:divisions,id',
            'defendant_district_id' => 'required|integer|exists:districts,id',
            'defendant_police_station_id' => 'required|integer|exists:police_stations,id',
            'defendant_organization_type' => 'required|string|max:255',

                 'status' => [
                     'required',
                     'string',
                     'max:255'
                 ]
        ]);
        
    }
    //GET: Get a specific case by ID
    public function store(Request $request)
    {
        $case = CaseManagement::create($request->all());
        if ($case) {
            return response()->json([
                'success' => true,
                'message' => 'Case created successfully',
                'data' => $case,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create case',
            ], 500);
        }
    }
    //GET case by ID
    public function show($id)
    {
        $case = CaseManagement::find($id);
        if ($case) {
            return response()->json([
                'success' => true,
                'message' => 'Case retrieved successfully',
                'data' => $case,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Case not found',
            ], 404);
        }
    }
    //PUT/PATCH: Update a specific case by ID
    public function update(Request $request, $id)
    {
        $case = CaseManagement::find($id);
        if ($case) {
            $case->update($request->all());
            return response()->json([       
                'success' => true,
                'message' => 'Case updated successfully',
                'data' => $case,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Case not found',
            ], 404);
        }
        $validatedData = $request->validate([
            'trade_union_name' => 'required|string|max:255',
            'case_issue_date' => 'required|date',
            'case_no_writ_petition_no' => 'required|string|max:255',
            'trade_union_address' => 'required|string|max:255',
            'division_id' => 'required|integer|exists:divisions,id',
            'district_id' => 'required|integer|exists:districts,id',
            'police_station_id' => 'required|integer|exists:police_stations,id',
            'court_type_id' => 'required|integer|exists:court_types,id',
            'court_id' => 'required|integer|exists:courts,id',
            'case_category_id' => 'required|integer|exists:case_categories,id',
            'case_sub_category_id' => 'nullable|integer|exists:case_categories,id',
            'case_subject' => 'required|string|max:255',
            'background_of_case_file' => 'nullable|string',

            'defendant_name' => 'required|string|max:255',
            'defendant_division_id' => 'required|integer|exists:divisions,id',
            'defendant_district_id' => 'required|integer|exists:districts,id',
            'defendant_police_station_id' => 'required|integer|exists:police_stations,id',
            'defendant_organization_type' => 'required|string|max:255',

                 'status' => [
                     'required',
                     'string',
                     'max:255'
                 ]
        ]);
    }
    //DELETE: Delete a specific case by ID
    public function destroy($id)
    {
        $case = CaseManagement::find($id);
        if ($case) {
            $case->delete();
            return response()->json([
                'success' => true,
                'message' => 'Case deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Case not found',
            ], 404);
        }
    }
}
