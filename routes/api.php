<?php

use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/sanctum/csrf-cookie', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function(){
    Route::post("fournisseur-login", [FournisseurController::class, 'fournisseurLogin']);
    Route::post("fournisseur-register", [FournisseurController::class, 'store']);
    Route::get('list-fournisseur', [FournisseurController::class, 'show']);
    Route::post("updateStatus", [FournisseurController::class, 'updateStatut']);
    Route::post("updateFournisseurstatus", [FournisseurController::class, 'updateStatusFournisseur']);

    Route::post("update-user", [UserController::class, 'UpdateUser']);
    Route::post("update-fournisseur", [UserController::class, 'UpdateFournisseur']);
    Route::post("user-login", [UserController::class, 'userLogin']);
    Route::post("user-register", [UserController::class, 'userRegister']);
    Route::get("getUserData", [UserController::class, 'userDetailFront']);

    
});


