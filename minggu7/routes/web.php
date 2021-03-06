<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class,
//  'index'])->name('home')->middleware('statusAdmin');

Route::get('/error', function(){
    return view ('error');
})->name('error');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 
'index'])->name('dashboard');

Route::group(
    ['namespace' => 'Backend'],
    function () {
        // Route::resource('/dashboard', DashboardController::class);
        Route::resource('/pengalaman_kerja', PengalamanKerjaController::class);
    }
);