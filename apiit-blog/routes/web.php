<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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
    return view('welcome');
});


Route::prefix('admin')->group(function () {

    //Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/categories', [CategoryController::class, 'index']);

    Route::get('/add-category', [CategoryController::class, 'Create']);

    Route::post('/add-category', [CategoryController::class, 'store']);

    Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit']);

    Route::put('/update-category/{category_id}', [CategoryController::class, 'update']);

    Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy']);
    
});

Route::get('/post',[PostController::class, 'index']);

Route::get('/add-post',[PostController::class, 'create']);

Route::post('/add-post',[PostController::class, 'store']);

Route::get('/post-edit/{post_id}', [PostController::class, 'edit']);

Route::put('update-post/{post_id}', [PostController::class, 'update']);

Route::get('/post-delete/{post_id}', [PostController::class, 'destroy']);