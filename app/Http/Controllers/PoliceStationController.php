<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\PoliceStation;

class PoliceStationController extends Controller
{
    // GET All PoliceStation data
    // Return data -> JSON
    public function index(): JsonResponse {
        $policestation = PoliceStation::all();

        return response()->json([
            'success' => true,
            'message' => 'PoliceStation retrive successfully',
            'count'   => $policestation->count(),
            'data'    => $policestation
        ], 200);
    }

    // TODO method store Data
    public function store(Request $request):JsonResponse{
        //Validation
        $validate = $request->validate([
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|max:100',
            'order'=> 'required|integer|min:0'
        ]);

        // Data create on table
        $policestation = new PoliceStation;
        $policestation->district_id = $request->district_id;
        $policestation->name = $request->name;
        $policestation->order= $request->order;
        // $PoliceStation->created_at = '';
        // $PoliceStation->updated_at='';
        $policestation->save();

        //Response
        return response()->json([
            'success' => true,
            'message' => 'PoliceStation created successfully',
            'data'    => $policestation
        ], 200);
    }
    // TODO: GET PoliceStation by ID
    public function show($id): JsonResponse
    {
        $policeStation = PoliceStation::find($id);

        // Check if police station exists
        if (!$policeStation) {
            return response()->json([
                'success' => false,
                'message' => 'Police Station not found'
            ], 404);
        }

        // Response
        return response()->json([
            'success' => true,
            'message' => 'Police Station retrieved successfully',
            'data' => $policeStation
        ], 200);
    }
    
    //GET district-wise police stations
    public function districtWisePoliceStation($district_id): JsonResponse
    {
        
    //Find all police stations for this district ID
    $policeStations = PoliceStation::where(
            'district_id',
            $district_id
        )->get();

    // Response
    return response()->json([
            'success' => true,
            'message' => 'District-wise police stations retrieved successfully',
            'count' => $policeStations->count(),
            'data' => $policeStations
        ], 200);
    }
}