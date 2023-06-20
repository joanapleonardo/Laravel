<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('bands.home');
});

Route::get('/home',
[BandController::class, 'home']
)->name('home');

Route::get('/home_all_bands', function () {
    return view('bands.view_bands');
})->name('show_all_bands');

Route::get('/all_albums', 
[BandController::class, 'all_albums'] 
)->name('show_all_albums');

Route::get('/add_album',
[BandController::class, 'add_albums'] 
)->name('add_album')->middleware('auth');

Route::post('/create_album',
[BandController::class, 'createAlbum']
)->name('create_album')->middleware('auth');

Route::post('/create_user',
[UserController::class, 'createUser']
)->name('create_user');

Route::get('/all_bands',
[BandController::class, 'all_bands']
)->name('show_all_bands');

Route::get('/show_band{id}',
[BandController::class, 'showBand']
)->name('show_band');

Route::post('/create_band',
[BandController::class, 'createBand']
)->name('create_band')->middleware('auth');

Route::get('/add_band',
[BandController::class, 'add_band'] 
)->name('add_band')->middleware('auth');

Route::get('/dashboard',
[DashboardController::class, 'index']
)->name('dashboard')->middleware('auth');

Route::get('/edit_band{id}',
[BandController::class, 'editarBanda']
)->name('edit_band')->middleware('auth');

Route::post('/update_band',
[BandController::class, 'editBand']
)->name('update_band')->middleware('auth');

Route::get('/delete_band{id}',
[BandController::class, 'deleteBand']
)->name('delete_band')->middleware('auth');

Route::get('/delete_albums{id}',
[BandController::class, 'deleteAlbum']
)->name('delete_album')->middleware('auth');

Route::post('/update_album',
[BandController::class, 'editAlbum']
)->name('update_album')->middleware('auth');

Route::get('/view_album{id}',
[BandController::class, 'viewAlbum']
)->name('show_album');

