<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StoresAdminController;
use App\Http\Controllers\Backend\StoreClinicsController;


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
    return redirect()->route('login');
});

/**
 * Dashboard route for the application.
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/**
 * All Backend Route prefix with Backend
 */
Route::prefix('/backend')->group(function(){
    /**
     * storeAdmin
     */
    Route::resource('/storeadmin', StoresAdminController::class);

    /**
     * Store clinic
     */
    Route::resource('/storeclinic', StoreClinicsController::class);
    Route::get('storeclinic-allotted', [StoreClinicsController::class, 'allotted'])->name('storeclinic.allotted'); 
});

require __DIR__.'/auth.php';
