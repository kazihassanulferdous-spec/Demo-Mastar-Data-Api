<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\District;


use App\Models\PoliceStation;
class DistrictController extends Controller
{
    // GET All district data
    // Return data -> JSON
    public function index(): JsonResponse {
        $district = District::all();

        return response()->json([
            'success' => true,
            'message' => 'District retrive successfully',
            'count'   => $district->count(),
            'data'    => $district
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
        $district = new District;
        $district->name = $request->name;
        $district->order= $request->order;
        // $district->created_at = '';
        // $district->updated_at='';
        $district->save();

        //Response
        return response()->json([
            'success' => true,
            'message' => 'District created successfully',
            'data'    => $district
        ], 200);
    }
    //TODO: GET district by id  
    public function show($id): JsonResponse{
        $district = District::find($id);
        
        // Check if district exists
        if (!$district) {
            return response()->json([
                'success' => false,
                'message' => 'District not found'
            ], 404);
        }

        //Response
        return response()->json([
            'success' => true,
            'message' => 'District retrieved successfully',
            'data'    => $district
        ], 200);
    }
       
     
}

