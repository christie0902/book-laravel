<?php

use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookshopController;




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

// Route:middleware('can:admin')->group(function () {
//     //define the group of paths
// });
// Route::group(['middleware' => 'can:admin'], function() {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
//     // ...
// });

Route::get('/', [BookController::class, 'display'])->name('home');
Route::get('/book/{book_id}', [BookController::class, 'getDetail'])->name('book.details');
Route::get('/test/model', [TestController::class, 'arrayResponse'])->name('apiTest');
Route::get('/test/model', [TestController::class, 'modelResponse']);
Route::get('/test/collection', [TestController::class, 'collectionResponse']);
Route::get('/books/latest', [TestController::class, 'latest']);

Route::get('/book/{book_id}/review/create', function ($book_id) {
    return view('books.add-review', ['book_id' => $book_id]);
})->name('review.create');
Route::post('/book/{book_id}/review/create', [ReviewController::class, 'create'])->name('review.add');


Route::get('/api/users', [UserController::class, 'index'])->name('users.get');

Route::get('/bookshops', [BookshopController::class, 'list'])->name('bookshops.list');
Route::get('/bookshops/{id}', [BookshopController::class, 'getDetails'])->name('bookshop.detail');


