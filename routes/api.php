use App\Models\PoliceStation;
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DisputeTypeController;
use App\Http\Controllers\CaseCategoryController;
use App\Http\Controllers\CourtTypeController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\CaseManagementController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\OrganizationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//GET ALL DIVISIONS
Route::get('/division', [DivisionController::class, 'index']);
//TODO: GET division by id
//Route::get('/division/{id}', [DivisionController::class, 'show']);
//Create Division
Route::post('/division', [DivisionController::class, 'store']);

//GET All district
Route::get('/districts',[DistrictController::class, 'index']);
// TODO: GET district by id 
Route::get('/district/{id}',[DistrictController::class, 'show']);
//Create District
Route::post('/district',[DistrictController::class,'store']);

//GET All PoliceStation
Route::get('/police-stations',[PoliceStationController::class, 'index']);
// TODO: GET PoliceStation by id
Route::get('/police-station/{id}',[PoliceStationController::class, 'show']);
//Create PoliceStation
Route::post('/police-station',[PoliceStationController::class, 'store']);
//GET district-wise police stations
Route::get('/district/{district_id}/police-stations', [PoliceStationController::class, 'districtWisePoliceStation']);


//GET All Dispute Types
Route::get('/dispute-types', [DisputeTypeController::class, 'index']);
//Create Dispute Type
Route::post('/dispute-type', [DisputeTypeController::class, 'store']);


//GET All Case Categories
Route::get('/case-categories', [CaseCategoryController::class, 'index']);
//Create Case Category
Route::post('/case-category', [CaseCategoryController::class, 'store']);   


//GET All Court Types
Route::get('/court-types', [CourtTypeController::class, 'index']);
//Create Court Type
Route::post('/court-type', [CourtTypeController::class, 'store']);


//Court Routes`
//GET All Courts
Route::get('/courts', [CourtController::class, 'index']);
//GET Single Court
Route::get('/courts/{id}', [CourtController::class, 'show']);
//Create Court
Route::post('/courts', [CourtController::class, 'store']);
//Update Court
Route::put('/courts/{id}', [CourtController::class, 'update']);
//Delete Court
Route::delete('/courts/{id}', [CourtController::class, 'destroy']);
//Court Routes
Route::apiResource('courts', CourtController::class);

//Case Management Routes
Route::apiResource('case-managements', CaseManagementController::class);

//Upazila Routes
Route::get('/upazilas', [UpazilaController::class, 'index']);
//Create Upazila
Route::post('/upazilas', [UpazilaController::class, 'store']);
//Get single Upazila by ID
Route::get('/upazilas/{id}', [UpazilaController::class, 'show']);
//Update Upazila
Route::put('/upazilas/{id}', [UpazilaController::class, 'update']);
//Delete Upazila
Route::delete('/upazilas/{id}', [UpazilaController::class, 'destroy']);
//District-wise Upazilas
Route::get('/districts/{district_id}/upazilas', [UpazilaController::class, 'getUpazilasByDistrict']);

//Organization Routes
Route::get('/organizations', [OrganizationController::class, 'index']);
//Create Organization
Route::post('/organizations', [OrganizationController::class, 'store']);
//Get single Organization by ID
Route::get('/organizations/{id}', [OrganizationController::class, 'show']);
//Update Organization
Route::put('/organizations/{id}', [OrganizationController::class, 'update']);
//Delete Organization
Route::delete('/organizations/{id}', [OrganizationController::class, 'destroy']);