<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarModelsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// General Routes
Route::controller(CarsController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/search', 'searchCompany')->name('searchCompany');
    Route::get('/show/{id}', 'show')->name('showCar');
    Route::group(['middleware' => ['role:admin|user']], function () {
        Route::get('/create/{company}', [CarModelsController::class, 'create'])->name('carModelCreate');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('storeCar');

    });


});

// Admin Create Routes
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::post('/dashboard/create/model/{company}/store', [CarModelsController::class, 'storeModel'])->name('storeModel');
    Route::post('/dashboard/create/users/store', [UserController::class, 'storeUser'])->name('storeUser');
});


// Edit And Delete Routes
Route::controller(CarsController::class)->group(function () {
    Route::group(['middleware' => ['role:admin|user']], function () {
        Route::get('/dashboard/edit/{id}', 'edit')->name('edit');
        Route::get('/dashboard/delete/{id}', 'delete')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/dashboard/edit/pics/{id}', 'manageImages')->name('manageImages');
        Route::get('/dashboard/edit/pics/{id}/delete', 'deleteImages')->name('deleteImages');
        Route::post('/dashboard/edit/pics/{id}/update', 'updateImages')->name('updateImages');
        Route::get('/dashboard/manage/models/delete/{model}', [CarModelsController::class, 'deleteModel'])->name('deleteModel');
        Route::put('/dashboard/manage/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/dashboard/manage/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/dashboard/manage/users/{id}/edit', [DashboardController::class, 'editUser'])->name('editUser');
    });
});






// General Dashboard Route
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/manage/ads', [DashboardController::class, 'manageAds'])->name('manageAds');
    Route::get('/dashboard/create/users', [DashboardController::class, 'createUser'])->name('createUser');
    Route::get('/dashboard/manage/models', [DashboardController::class, 'manageModels'])->name('manageModels');
    Route::get('/dashboard/manage/users', [DashboardController::class, 'manageUsers'])->name('manageUsers');
    Route::get('/dashboard/create/model', [DashboardController::class, 'createModel'])->name('modelCreate');
    Route::get('/dashboard/create/model/{company}', [DashboardController::class, 'chooseCompany'])->name('chooseCompany');


});

// Logout
Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
