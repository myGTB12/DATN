<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationOwner\StationController;
use App\Http\Controllers\StationOwner\VehicleController;
use App\Http\Controllers\StationOwner\ReservationController;
use App\Http\Controllers\Admin\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(["prefix" => "/"], function () {
    Route::match(["get", "post"], "/login", [LoginController::class, "login"])
        ->name("login");
    Route::get("/logout", [LoginController::class, "logout"])->name("logout");
});

Route::group(["prefix" => "admin"], function () {
    Route::group(["prefix" => "station"], function () {
        Route::get("/stations", [StationController::class, "index"]);
        Route::get("/stationOwners", [StationController::class, "index"]);
        Route::post("/create", [StationController::class, "create"]);
        Route::post("/edit", [StationController::class, "edit"]);
        Route::post("/show", [StationController::class, "show"]);
        Route::post("/delete", [StationController::class, "delete"]);
    });

    Route::group(["prefix" => "reservation"], function () {
        Route::get("/reservations", [ReservationController::class, "index"]);
        Route::post("/create", [ReservationController::class, "create"]);
        Route::post("/edit", [ReservationController::class, "edit"]);
        Route::post("/show", [ReservationController::class, "show"]);
        Route::post("/delete", [ReservationController::class, "delete"]);
    });

    Route::group(["prefix" => "vehicle"], function () {
        Route::get("/vehicles", [VehicleController::class, "index"]);
        Route::post("/create", [VehicleController::class, "create"]);
        Route::post("/edit", [VehicleController::class, "edit"]);
        Route::post("/show", [VehicleController::class, "show"]);
        Route::post("/delete", [VehicleController::class, "delete"]);
    });
});
