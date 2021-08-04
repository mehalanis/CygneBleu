<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\VoyageOrganiseController;
use App\Http\Controllers\VoyageOrganiseReservationController;
use App\Http\Controllers\PaysController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelReservationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\BilletReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BilletDateController;
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
Route::get('/GetVilleArriveeJson',[HomeController::class,"GetVilleArriveeJson"])->name("GetVilleArriveeJson");
/*    * */
Route::get('/VoyageOrganise',[VoyageOrganiseController::class,"VoyageOrganise"])->name("VoyageOrganiseController.VoyageOrganise");
Route::get('/VoyageOrganise/GetVoyageOrganise',[VoyageOrganiseController::class,"GetVoyageOrganise"])->name("VoyageOrganiseController.GetVoyageOrganise");
Route::get('/VoyageOrganise/{voyageOrganise}',[VoyageOrganiseController::class,"ShowDetail"])->name("VoyageOrganiseController.ShowDetail");
Route::post('/VoyageOrganise/New',[VoyageOrganiseReservationController::class,"store"])->name("VoyageOrganiseReservationController.store");
/* * */
Route::get('/Hotel',[HotelController::class,"Hotel"])->name("HotelController.Hotel");
Route::get('/Hotel/GetHotel',[HotelController::class,"GetHotel"])->name("HotelController.GetHotel");
Route::get('/Hotel/{Hotel}',[HotelController::class,"show"])->name("HotelController.show");
Route::post('/HotelReservation/New',[HotelReservationController::class,"store"])->name("HotelReservationController.store");


/*  * */
Route::get("/Pays/GetVillesJSON/",[PaysController::class,"GetVillesJSON"])->name("PaysController.GetVillesJsonURL");
Route::get("/Pays/GetVillesJSON/{pays}",[PaysController::class,"GetVillesJSON"])->name("PaysController.GetVillesJSON");
/* */
Route::get('/Billet/Reservation/{id}',[BilletController::class,"Billet"])->name("BilletController.Billet");
Route::post('/BilletReservation/New',[BilletReservationController::class,"store"])->name("BilletReservation.store");
Route::get("/BilletDate/GetDateBilletJson",[BilletController::class,"GetDateBilletJson"])->name("BilletController.GetDateBilletJson");

Route::group(['prefix' => 'admin', 'middleware' => ['auth']],function () {
    Route::resources([
        "GeneralSetting" =>GeneralSettingController::class,
        "VoyageOrganise" =>VoyageOrganiseController::class,
        "VoyageOrganiseReservation"=>VoyageOrganiseReservationController::class,
        "Hotel"=>HotelController::class,
        "HotelReservation"=>HotelReservationController::class,
        "Client"=>ClientController::class,
        "Pays"=>PaysController::class,
        "Billet"=>BilletController::class,
        "BilletReservation"=>BilletReservationController::class,
        "User"=>UserController::class
    ]);



    /* DataTable * */
    Route::get("/VoyageOrganise/list/datatables",[VoyageOrganiseController::class,"datatables"])->name("VoyageOrganiseController.datatables");
    Route::get("/VoyageOrganiseReservationController/list/datatables",[VoyageOrganiseReservationController::class,"datatables"])->name("VoyageOrganiseReservationController.datatables");
    Route::get("/Hotel/list/datatables",[HotelController::class,"datatables"])->name("Hotel.datatables");
    Route::get("/HotelReservation/list/datatables",[HotelReservationController::class,"datatables"])->name("HotelReservationController.datatables");
    Route::get("/Pays/list/datatables",[PaysController::class,"datatables"])->name("PaysController.datatables");
    Route::get("/Billet/list/datatables",[BilletController::class,"datatables"])->name("BilletController.datatables");
    Route::get("/BilletReservation/list/datatables",[BilletReservationController::class,"datatables"])->name("BilletReservationController.datatables");
    Route::get("/User/list/datatables",[UserController::class,"datatables"])->name("UserController.datatables");


    Route::get('/index', function () {
        return view('Admin.index');
    })->name("admin.index");

});
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
Route::get('/key', function () {
    Artisan::call('key:generate');
});

Auth::routes();

//Route::get('/home', function () { return view('Admin.index'); })->name('home');
