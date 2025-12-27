<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DueController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
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
    return view("admin.pages.login");
})->name('login');
Route::get('/logout', function () {
    return redirect()->route("login");
})->name('logout');

Route::resource('blog', BlogController::class);
Route::resource('due', DueController::class);
Route::resource('service', ServiceController::class);
Route::resource('contact', ContactController::class);
Route::resource('admin', AdminController::class);
Route::resource('service_category', ServiceCategoryController::class);
Route::resource('blog_category', BlogCategoryController::class);

// new routes for tnm
// Route::get('/case-study/create', [CaseStudyController::class, 'create'])->name('case-study.create');