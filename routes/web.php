<?php


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HallController;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::middleware(['auth','verified','role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin'); // Correspond à resources/views/dashboard/admin.blade.php
    })->name('admin.dashboard');

    Route::resource('companies', CompanyController::class);
    Route::resource('halls', HallController::class);
    Route::resource('features', FeatureController::class);
});


Route::middleware(['auth','verified','role:owner'])->group(function () {

    Route::get('/owner/dashboard', function () {
        return view('dashboard.owner'); // Correspond à resources/views/dashboard/owner.blade.php
    })->name('owner.dashboard');

    Route::resource('companies', CompanyController::class)->only(['create', 'edit', 'update']);
    Route::resource('halls', HallController::class);
    Route::resource('features', FeatureController::class);
});



Route::middleware(['auth', 'verified', 'role:client'])->group(function () {

    Route::get('/client/dashboard', function () {
        return view('dashboard.client'); // Correspond à resources/views/dashboard/owner.blade.php
    })->name('client.dashboard');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
