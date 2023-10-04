<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilyMemberApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('family-members', [FamilyMemberApiController::class, 'index']);
Route::post('family-members', [FamilyMemberApiController::class, 'store']);
Route::get('family-members/{id}', [FamilyMemberApiController::class, 'show']);
Route::post('family-members/{id}', [FamilyMemberApiController::class, 'update']);
Route::delete('family-members/{id}', [FamilyMemberApiController::class, 'destroy']);

