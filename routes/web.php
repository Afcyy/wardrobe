<?php

use App\Http\Controllers\ClothingController;
use App\Http\Controllers\OutfitsController;
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

Route::middleware('auth')->group(function () {
    Route::resource('outfit', ClothingController::class);
    Route::post('save-outfit', [OutfitsController::class, 'store'])->name('save-outfit');
});

require __DIR__.'/auth.php';
