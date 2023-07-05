<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PostController;


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

Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('login.submit');


Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('/menus', [MenuController::class, 'index'])->name('admin.menus.index');
    Route::get('/menus/create', [MenuController::class, 'create']);
    Route::post('/menus', [MenuController::class, 'store']);
    Route::get('/menus/{id}/edit', [MenuController::class, 'edit']);
    Route::patch('/menus/{id}', [MenuController::class, 'update']);
    Route::delete('/menus/{id}', [MenuController::class, 'destroy']);
    Route::post('/menu/update-order', [MenuController::class, 'updateOrder'])->name('menu.updateOrder');
    Route::resource('categories', CategoriesController::class);
    Route::get('/about_us', [AboutUsController::class, 'edit'])->name('admin.about_us.edit');
    Route::post('/about_us', [AboutUsController::class, 'update'])->name('admin.about_us.update');
    Route::post('/admin/about_us/upload_image', [AboutUsController::class, 'uploadImage'])->name('admin.about_us.upload_image');
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::post('admin/posts/upload', [PostController::class, 'uploadEditorImage'])->name('admin.posts.upload_image');
});
