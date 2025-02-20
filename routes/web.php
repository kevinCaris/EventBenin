<?php


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HallAvailabilityController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HallPicturesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\HallPictures;
use App\Models\Message;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Support\Facades\Route;
use Tests\Localization\MeTest;

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

// Route::view('/', 'welcome');
Route::get('/', [HallController::class, 'home'])->name('home');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('blog');
Route::get('/about',function(){
    return view('pages.about');
})->name('about');
Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


Route::get('/salles', [HallController::class, 'showForGuests'])->name('halls.guest');
Route::get('/salles/{hall}', [HallController::class, 'showGuest'])->name('guest.hall.show');


Route::middleware(['auth','verified','role:client'])->group(function () {
    Route::resource('events', EventsController::class);
    Route::get('/events/{event}/download-invoice', [EventsController::class, 'downloadInvoice'])->name('events.downloadInvoice');

});

Route::resource('reviews', ReviewController::class);



// Route::middleware(['auth'])->group(function () {
// Route::middleware(['auth'])->group(function () {
//     Route::get('/chat/{conversation}', [MessageController::class, 'showChat'])->name('chat.show');
//     Route::get('/chat/messages/{conversation}', [MessageController::class, 'getMessages']);
//     Route::post('/chat/send', [MessageController::class, 'sendMessage']);
// });
// Route::middleware(['auth'])->group(function () {
//     Route::get('/chat/{conversation}', [MessageController::class, 'showChat'])->name('chat.show');
//     Route::post('/chat/send', [MessageController::class, 'sendMessage']);
// });

Route::middleware(['auth','verified','role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin'); // Correspond à resources/views/dashboard/admin.blade.php
    })->name('admin.dashboard');

    Route::view('profile', 'livewire.dashboard.profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::resource('companies', CompanyController::class);
    Route::resource('halls', HallController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('eventTypes', EventTypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('HallPictures', HallPicturesController::class);
    // Route::resource('events', EventsController::class);
});


Route::middleware(['auth','verified','role:owner'])->group(function () {

    Route::view('company', 'livewire.pages.auth.new-company')
    ->middleware(['auth'])
    ->name('company');

    Route::get('/owner/dashboard', function () {
        return view('dashboard.owner'); // Correspond à resources/views/dashboard/owner.blade.php
    })->name('owner.dashboard');

    Route::view('settings', 'livewire.dashboard.settings')
    ->middleware(['auth'])
    ->name('settings');

    Route::resource('companies', CompanyController::class)->only(['create', 'edit', 'update']);
    Route::resource('halls', HallController::class);
    Route::resource('eventTypes', EventTypeController::class);
    Route::resource('features', FeatureController::class);
    // Route::resource('availabilities', HallAvailabilityController::class);
    Route::resource('HallPictures', HallPicturesController::class);
    Route::get('/calendar', [EventsController::class, 'showCalendar'])->name('events.calendar');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
