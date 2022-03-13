<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\Admin\DashboardController;

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
    return redirect('/recipe');
});

Auth::routes(['register' => false]);

Route::get('/recipe', [RecipeController::class, 'index'])->name('recipe');
Route::get('/recipe/detail/{id}', [RecipeController::class, 'view'])->name('recipe-detail');

Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.recipe.list')->middleware('auth');
Route::get('admin/recipe/create', [DashboardController::class, 'create'])->name('admin.recipe.create')->middleware('auth');
Route::post('admin/recipe/store', [DashboardController::class, 'store'])->name('admin.recipe.store')->middleware('auth');
Route::get('admin/recipe/{id}/show', [DashboardController::class, 'show'])->name('admin.recipe.show')->middleware('auth');
Route::get('admin/recipe/{id}/edit', [DashboardController::class, 'edit'])->name('admin.recipe.edit')->middleware('auth');
Route::post('admin/recipe/{id}', [DashboardController::class, 'update'])->name('admin.recipe.update')->middleware('auth');
Route::get('admin/recipe/{id}', [DashboardController::class, 'delete'])->name('admin.recipe.destory')->middleware('auth');
