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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/shares', [ShareController::class,'index'])->middleware(['auth']);
Route::get('/share/show/{share:id}', [ShareController::class,'show']);
Route::get('/share/create', [ShareController::class,'create']);
Route::post('/share/create', [ShareController::class,'store']);
Route::get('/share/edit/{share:id}',[ShareController::class,'edit']);
Route::patch('/share/edit/{share:id}',[ShareController::class,'update']);
Route::delete('/share/delete/{share:id}',[ShareController::class,'destroy']);
