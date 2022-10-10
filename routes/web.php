<?php

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebsiteController::class, 'main_website']);


Route::get('/loginpanel', [LoginController::class, 'main_panel_login'])->name('login')->middleware('guest');;
Route::post('/loginpanel', [LoginController::class, 'authenticate_admin']);
Route::get('/dashboard/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'main_panel']);
    Route::get('/dashboard/slider', [SliderController::class, 'panel_master_slider']);
    Route::post('/dashboard/slider-tambah', [SliderController::class, 'panel_master_slider_tambah']);
    Route::get('/dashboard/slider/get-data/{id}', [SliderController::class, 'panel_master_slider_get_data']);
    Route::patch('/dashboard/slider/update', [SliderController::class, 'panel_master_slider_update']);
    Route::delete('/dashboard/slider/delete', [SliderController::class, 'panel_master_slider_delete']);
    
    Route::get('/dashboard/data-menu', [MenuController::class, 'panel_master_menu']);
    Route::post('/dashboard/menu-tambah', [MenuController::class, 'panel_master_menu_tambah']);
    Route::get('/dashboard/menu/get-data/{id}', [MenuController::class, 'panel_master_menu_get_data']);
    Route::patch('/dashboard/menu/update', [MenuController::class, 'panel_master_menu_update']);
    Route::delete('/dashboard/menu/delete', [MenuController::class, 'panel_master_menu_delete']);
    
    Route::get('/dashboard/galeri', [GaleriController::class, 'panel_master_galeri']);
    Route::post('/dashboard/galeri-tambah', [GaleriController::class, 'panel_master_galeri_tambah']);
    Route::get('/dashboard/galeri/get-data/{id}', [GaleriController::class, 'panel_master_galeri_get_data']);
    Route::patch('/dashboard/galeri/update', [GaleriController::class, 'panel_master_galeri_update']);
    Route::delete('/dashboard/galeri/delete', [GaleriController::class, 'panel_master_galeri_delete']);
    
    Route::get('/dashboard/data-kontak', [KontakController::class, 'main_panel_kontak']);
    Route::patch('/dashboard/kontak/update', [KontakController::class, 'panel_master_kontak_update']);
});