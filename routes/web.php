<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StationOwner\StationController;
use App\Http\Controllers\StationOwner\VehicleController;
use App\Http\Controllers\StationOwner\ReservationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\StationOwner\Auth\StationOwnerLoginController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\UserController;

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
    Route::get('/', [UserController::class, "home"])->name('home');
    Route::post('/login', [UserLoginController::class, "login"])->name('user.login');
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('user.logout');
    Route::match(['get', 'post'], "/profile/{user_id}", [UserLoginController::class, 'profile'])->name('user.profile');
    Route::post("/register", [UserLoginController::class, 'register'])->name('user.register');
    Route::post("searchByCar", [VehicleController::class, 'searchByCar'])->name('vehicle.searchByCar');
    Route::post("searchByStation", [VehicleController::class, 'searchByStation'])->name('vehicle.searchByStation');
});

Route::group([
    "prefix" => "admin",
    // "middleware" => "auth",
], function () {
    Route::group(["prefix" => "tationOwners"], function () {
        Route::match(['get', 'post'], "/edit/{id}", [AdminController::class, "editStationOwner"])->name("users.edit");
        Route::get("/", [AdminController::class, "getListStationOwner"])->name("users.list");
        Route::post("/{id}", [AdminController::class, "deleteStationOwner"])->name("users.delete");
        Route::match(['get', 'post'], "/request", [AdminController::class, "approveRequest"])->name("users.request");
    });
    Route::match(["get", "post"], "/login", [LoginController::class, "login"])
        ->name("login");
    Route::get("/logout", [LoginController::class, "logout"])->name("logout");
});

Route::group(["prefix" => "station"], function () {
    Route::match(['get', 'post'], "/login", [StationOwnerLoginController::class, "login"])->name("station.login");
    Route::get("/stations", [StationController::class, "index"])->name('stations.index');
    Route::post("/create", [StationController::class, "create"]);
    Route::match(['get', 'post'], "/edit/{id}", [StationController::class, "edit"])->name('station.edit');
    Route::post("/delete", [StationController::class, "delete"]);

    Route::group(["prefix" => "{station_id}/vehicle"], function () {
        Route::get("/index", [VehicleController::class, "index"])->name('vehicle.index');
        Route::match(['get', 'post'], "/create", [VehicleController::class, "create"])->name('vehicle.create');
        Route::post("/edit/{id}", [VehicleController::class, "edit"])->name('vehicle.edit');
        Route::get("/show/{id}", [VehicleController::class, "show"])->name('vehicle.show');
        Route::post("/delete/{id}", [VehicleController::class, "delete"])->name('vehicle.delete');
    });
});

Route::group(["prefix" => "reservation"], function () {
    Route::get("/reservations", [ReservationController::class, "index"]);
    Route::post("/create", [ReservationController::class, "create"]);
    Route::post("/edit", [ReservationController::class, "edit"]);
    Route::post("/show", [ReservationController::class, "show"]);
    Route::post("/delete", [ReservationController::class, "delete"]);
});
