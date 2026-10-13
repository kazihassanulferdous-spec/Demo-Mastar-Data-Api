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
            'name' => 'required|string|max:100',
            'order'=> 'required|integer|min:0'
        ]);

        // Data create on table
        $policestation = new PoliceStation;
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
}