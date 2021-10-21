<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShareController;

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

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [ShareController::class,'welcome'])->name('dashboard');
Route::get('/dashboard', [ShareController::class,'welcome'])->name('dashboard');

Route::get('/shares', [ShareController::class,'index']);
Route::get('/share/show/{share:id}', [ShareController::class,'show']);
Route::get('/share/create', [ShareController::class,'create'])->name('new')->middleware(['auth']);
Route::post('/share/create', [ShareController::class,'store'])->middleware(['auth']);
Route::get('/share/edit/{share:id}',[ShareController::class,'edit'])->middleware(['auth']);
Route::patch('/share/edit/{share:id}',[ShareController::class,'update'])->middleware(['auth']);
Route::delete('/share/delete/{share:id}',[ShareController::class,'destroy'])->middleware(['auth']);

Route::get('/profile', [ShareController::class,'profile'])->name('profile');
Route::get('/profile/{share:user_id}', [ShareController::class,'userprof'])->name('userprof');

