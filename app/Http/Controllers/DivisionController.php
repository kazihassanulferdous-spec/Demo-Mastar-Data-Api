<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Division;


class DivisionController extends Controller{
    // GET All Division data
    // Return data -> JSON
    public function index(): JsonResponse {
        $division = Division::all();

        return response()->json([
            'success' => true,
            'message' => 'Division retrive successfully',
            'count'   => $division->count(),
            'data'    => $division
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
        $division = new Division;
        $division->name = $request->name;
        $division->order= $request->order;
        // $district->created_at = '';
        // $district->updated_at='';
        $division->save();

        //Response
        return response()->json([
            'success' => true,
            'message' => 'Division created successfully',
            'data'    => $division
        ], 200);
    }
}
