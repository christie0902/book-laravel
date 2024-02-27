<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\BookController;
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

Route::get('/', [BookController::class, 'display'])->name('home');
Route::get('/test/model', [TestController::class, 'arrayResponse'])->name('apiTest');
Route::get('/test/model', [TestController::class, 'modelResponse']);
Route::get('/test/collection', [TestController::class, 'collectionResponse']);
