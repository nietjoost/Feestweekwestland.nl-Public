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

/*|--------------------------------------------------------------------------
| Guest routes
|--------------------------------------------------------------------------
*/

Route::get('/', [App\Http\Controllers\GuestController::class, 'home'])->name('home');
Route::get('/browse', [App\Http\Controllers\GuestController::class, 'browse'])->name('browse');
Route::get('/about', [App\Http\Controllers\GuestController::class, 'about'])->name('about');

Route::group([ 'prefix' => 'dorp' ], function() {
    Route::get('/{dorp}', [App\Http\Controllers\GuestController::class, 'show'])->name('show');
    Route::get('/{dorp}/{naam}', [App\Http\Controllers\GuestController::class, 'showEvenement'])->name('showEvenement');
});

/*|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
*/

Auth::routes([
  'register' => false, // Register Routes...
  'reset' => false, // Reset Password Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => 'auth'], function () {
    Route::group([ 'prefix' => 'admin' ], function() {
          Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');

          Route::group([ 'prefix' => 'dorp' ], function() {
              Route::get('/', [App\Http\Controllers\DorpController::class, 'index'])->name('index');

              Route::get('create', [App\Http\Controllers\DorpController::class, 'create'])->name('create');
              Route::post('create', [App\Http\Controllers\DorpController::class, 'store'])->name('store');

              Route::get('edit/{id}', [App\Http\Controllers\DorpController::class, 'edit'])->name('edit');
              Route::post('edit/{id}', [App\Http\Controllers\DorpController::class, 'update'])->name('update');

              Route::get('delete/{id}', [App\Http\Controllers\DorpController::class, 'destroy'])->name('destroy');
          });

          Route::group([ 'prefix' => 'evn' ], function() {
              Route::get('/', [App\Http\Controllers\EvenementController::class, 'index'])->name('index');

              Route::get('create', [App\Http\Controllers\EvenementController::class, 'create'])->name('create');
              Route::post('create', [App\Http\Controllers\EvenementController::class, 'store'])->name('store');

              Route::get('edit/{id}', [App\Http\Controllers\EvenementController::class, 'edit'])->name('edit');
              Route::post('edit/{id}', [App\Http\Controllers\EvenementController::class, 'update'])->name('update');

              Route::get('delete/{id}', [App\Http\Controllers\EvenementController::class, 'destroy'])->name('destroy');
          });

          Route::group([ 'prefix' => 'link' ], function() {
              Route::get('/', [App\Http\Controllers\LinkController::class, 'index'])->name('index');

              Route::get('create', [App\Http\Controllers\LinkController::class, 'create'])->name('create');
              Route::post('create', [App\Http\Controllers\LinkController::class, 'store'])->name('store');

              Route::get('edit/{id}', [App\Http\Controllers\LinkController::class, 'edit'])->name('edit');
              Route::post('edit/{id}', [App\Http\Controllers\LinkController::class, 'update'])->name('update');

              Route::get('delete/{id}', [App\Http\Controllers\LinkController::class, 'destroy'])->name('destroy');
          });

          Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
          Route::get('settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
          Route::get('settings/clearimage', [App\Http\Controllers\AdminController::class, 'clearimage'])->name('clearimage');
    });
});
