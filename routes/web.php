<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\VoyageOrganiseController;
use App\Http\Controllers\VoyageOrganiseReservationController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,"index"])->name("index");
Route::get('/Contact',[HomeController::class,"Contact"])->name("Contact");

/*    * */
Route::get('/VoyageOrganise',[VoyageOrganiseController::class,"VoyageOrganise"])->name("VoyageOrganiseController.VoyageOrganise");
Route::get('/VoyageOrganise/GetVoyageOrganise',[VoyageOrganiseController::class,"GetVoyageOrganise"])->name("VoyageOrganiseController.GetVoyageOrganise");
Route::get('/VoyageOrganise/{voyageOrganise}',[VoyageOrganiseController::class,"ShowDetail"])->name("VoyageOrganiseController.ShowDetail");
Route::post('/VoyageOrganise/New',[VoyageOrganiseReservationController::class,"store"])->name("VoyageOrganiseReservationController.store");

/*  * */
Route::get("/Pays/GetVillesJSON/",[PaysController::class,"GetVillesJSON"])->name("PaysController.GetVillesJsonURL");
Route::get("/Pays/GetVillesJSON/{pays}",[PaysController::class,"GetVillesJSON"])->name("PaysController.GetVillesJSON");

Route::prefix('admin')->group(function () {
    Route::resources([
        "GeneralSetting" =>GeneralSettingController::class,
        "VoyageOrganise" =>VoyageOrganiseController::class,
        "VoyageOrganiseReservation"=>VoyageOrganiseReservationController::class
    ]);
    Route::get("/VoyageOrganise/list/datatables",[VoyageOrganiseController::class,"datatables"])->name("VoyageOrganiseController.datatables");
    Route::get("/VoyageOrganiseReservationController/list/datatables",[VoyageOrganiseReservationController::class,"datatables"])->name("VoyageOrganiseReservationController.datatables");

    Route::get('/index', function () {
        return view('Admin.index');
    })->name("admin.index");
    
});
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});