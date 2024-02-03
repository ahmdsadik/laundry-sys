<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ItemServiceController;

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

Route::get('/overview', function () {
    return view('overview');
})->middleware(['auth', 'check-status'])->name('overview');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('items-services', ItemServiceController::class)->except('show');
Route::resource('services', ServiceController::class)->except('show');
Route::resource('items', ItemController::class)->except('show');




Route::post('users/toggle-suspension/{user}', [UserController::class, 'toggleSuspension'])->name('users.suspension.toggle');
Route::post('users/reset-default-password/{user}', [UserController::class, 'resetPassword'])->name('users.password-reset');
Route::resource('users', UserController::class)->except('show')->middleware('is-admin');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
