<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//route
Route::get('/', [ItemController::class, 'itemView']);
Route::post('/update-items', [ItemController::class, 'updateItems'])->name('update.items');

// 
Route::get('/category', [ItemController::class, 'index']);
Route::post('/category', [ItemController::class, 'store'])->name('category.items');
