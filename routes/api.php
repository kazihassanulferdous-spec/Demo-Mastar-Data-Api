use App\Models\PoliceStation;
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\HTTP\Controllers\PoliceStationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//GET All district
Route::get('/districts',[DistrictController::class, 'index']);
//Create District
Route::post('/district',[DistrictController::class,'store']);

//GET All district
Route::get('/police-stations',[PoliceStationController::class, 'index']);
//Create District
Route::post('/police-station',[PoliceStationController::class, 'store']);

