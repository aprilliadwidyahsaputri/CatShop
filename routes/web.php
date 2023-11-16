<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/tambah', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::put('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/hapus/{id}', [CategoryController::class, 'delete']);
Route::get('/category/destroy/{id}', [CategoryController::class, 'destroy']);
Route::get('/category/cetak', [CategoryController::class, 'cetak']);

Route::get('/transaction', [TransactionController::class, 'index']);
Route::get('/transaction/tambah', [TransactionController::class, 'create']);
Route::post('/transaction/store', [TransactionController::class, 'store']);
Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit']);
Route::put('/transaction/update/{id}', [TransactionController::class, 'update']);
Route::get('/transaction/hapus/{id}', [TransactionController::class, 'delete']);
Route::get('/transaction/destroy/{id}', [TransactionController::class, 'destroy']);

