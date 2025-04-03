<?php

use App\Http\Controllers\BackupApiController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\DireccionController;
use App\Http\Controllers\OficioController;
use App\Http\Controllers\ParroquiaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SolicitanteController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Models\Direccion;
use App\Models\Solicitud;

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
Route::get("ap/", function(){
    return 1;
});
Route::prefix("Cargo")->group(function(){
    Route::get("/GetAll", [CargoController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [CargoController::class, "GetOne"]);
    Route::post("/Guardar", [CargoController::class, "Save"]);
    Route::put("/Update/{id}", [CargoController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [CargoController::class, "RemoveOne"]);
});

Route::prefix("Direccion")->group(function(){
    Route::get("/GetAll", [DireccionController::class, "GetAllPaginate"]);
    Route::get("/GetByDireccion", [DireccionController::class, "GetAllByDireccion"]);

    Route::get("/FindOne/{id}", [DireccionController::class, "GetOne"]);
    Route::post("/Guardar", [DireccionController::class, "Save"]);
    Route::put("/Update/{id}", [DireccionController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [DireccionController::class, "RemoveOne"]);
});

Route::prefix("Oficio")->group(function(){
    Route::get("/GetAll", [OficioController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [OficioController::class, "GetOne"]);
    Route::post("/Guardar", [OficioController::class, "Save"]);
    Route::put("/Update/{id}", [OficioController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [OficioController::class, "RemoveOne"]);
});

Route::prefix("Parroquia")->group(function(){
    Route::get("/GetAll", [ParroquiaController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [ParroquiaController::class, "GetOne"]);
    Route::get("/GetStats", [ParroquiaController::class, "GetAllPaginateByStats"]);
    Route::get("/GetByYear", [ParroquiaController::class, "GetAllPaginateByYear"]);

    Route::post("/Guardar", [ParroquiaController::class, "Save"]);
    Route::put("/Update/{id}", [ParroquiaController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [ParroquiaController::class, "RemoveOne"]);
});

Route::prefix("Rol")->group(function(){
    Route::get("/GetAll", [RolController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [RolController::class, "GetOne"]);
    Route::post("/Guardar", [RolController::class, "Save"]);
    Route::put("/Update/{id}", [RolController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [RolController::class, "RemoveOne"]);
});

Route::prefix("Solicitante")->group(function(){
    Route::get("/GetAll", [SolicitanteController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [SolicitanteController::class, "GetOne"]);
    Route::post("/Guardar", [SolicitanteController::class, "Save"]);
    Route::put("/Update/{id}", [SolicitanteController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [SolicitanteController::class, "RemoveOne"]);
});

Route::prefix("Solicitud")->group(function(){
    Route::get("/GetAll", [SolicitudController::class, "GetAllPaginate"]);
    Route::get("/FindOne/{id}", [SolicitudController::class, "GetOne"]);
    Route::post("/Guardar", [SolicitudController::class, "Save"]);
    Route::put("/Update/{id}", [SolicitudController::class, "UpdateOne"]);
    Route::delete("/Eliminar/{id}", [SolicitudController::class, "RemoveOne"]);
});



Route::prefix("BackUp")->group(function(){
    Route::post("/GetBackUp", [BackupApiController::class, "crearBackup"]);
    Route::post("/ShowBackUp", [BackupApiController::class, "obtenerListaBackups"]);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
