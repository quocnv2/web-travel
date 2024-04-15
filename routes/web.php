<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

//Route::get('/', function () {
//    return view('admin_view.Pages.Home');
//});

Route::prefix('travel-admin') -> group(function () {
    Route::get('/danh-muc', [CategoryController::class, 'category'])->name('category');
    Route::get('/them-moi-danh-muc', [CategoryController::class, 'category_cre'])->name('category_cre');
    Route::post('/post-them-moi-danh-muc', [CategoryController::class, 'create_category'])->name('create_category');
});
