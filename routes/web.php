<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToiletCodinatesController;
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

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
// ->middleware(['auth', 'verified'])

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/addmap', [ToiletCodinatesController::class, 'index'])->name('toiletCodinates.store');

    Route::post('/addmap', [ToiletCodinatesController::class, 'store'])->name('toiletCodinates.store');

    Route::get('/neartoilet', [ToiletCodinatesController::class, 'neartoilet'])->name('neartoilet');

});
Route::get('/dashboard', [ToiletCodinatesController::class, 'show'])->name('dashboard');


require __DIR__.'/auth.php';
