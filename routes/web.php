<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\MonetaryInformationController;
use App\Http\Controllers\Admin\SalediengFamiliesController;
use App\Http\Controllers\Admin\SalediengMonthController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ImageSlidersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriePostController;
use App\Http\Controllers\SearchPostController;
use App\Http\Controllers\SalediengController;


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

Route::get('/', [HomeController::class, 'index']);
Route::get('/gioi-thieu', [HomeController::class, 'introduce'])->name('introduce');
Route::get('/ho-tro', [HomeController::class, 'support']);
Route::get('/quyen-gop', [HomeController::class, 'donate']);
Route::get('/html-content', [HomeController::class, 'html_content']);

Route::get('/news', [CategoriePostController::class, 'list_post_all'])->name('post_all');
Route::get('news/{menu?}', [CategoriePostController::class, 'list_post_menu'])->name('list.menus');
Route::get('news/{menu?}/{category?}', [CategoriePostController::class, 'list_post_category'])->name('list.categories');
Route::get('news-detail/{id}/{title?}', [CategoriePostController::class, 'detail_post'])->name('detail.post');

Route::get('/mega', [CategoriePostController::class, 'list_mega_post'])->name('list.mega');
Route::get('/mega/{id}/{title?}', [CategoriePostController::class, 'detail_mega'])->name('detail.mega');

Route::get('/search', [SearchPostController::class, 'search_post'])->name('search.post');
Route::get('/saledieng/{id}', [SalediengController::class, 'index'])->name('saledieng.index');

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
    Route::post('/admin/menu/upload_image', [MenuController::class, 'uploadImage'])->name('admin.menus.upload_image');
    Route::post('/categories/archive/{category}', [CategoriesController::class, 'archive'])->name('admin.categories.archive');
    Route::get('/categories/archived_categories', [CategoriesController::class, 'archived_categories'])->name('admin.categories.archived_categories');
    Route::resource('categories', CategoriesController::class);
    Route::get('/about_us', [AboutUsController::class, 'edit'])->name('admin.about_us.edit');
    Route::post('/about_us', [AboutUsController::class, 'update'])->name('admin.about_us.update');
    Route::post('/admin/about_us/upload_image', [AboutUsController::class, 'uploadImage'])->name('admin.about_us.upload_image');
    Route::post('/posts/archive/{post}', [PostController::class, 'archive'])->name('admin.posts.archive');
    Route::get('/posts/archived_posts', [PostController::class, 'archived_posts'])->name('admin.posts.archived_posts');
    Route::get('/posts/saledieng_posts', [PostController::class, 'saledieng_posts'])->name('admin.posts.saledieng_posts');
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::post('admin/posts/upload', [PostController::class, 'uploadEditorImage'])->name('admin.posts.upload_image');
    Route::resource('image_sliders', ImageSlidersController::class);
    Route::get('/monetary_information', [MonetaryInformationController::class, 'edit'])->name('admin.monetary_information.edit');
    Route::post('/monetary_information', [MonetaryInformationController::class, 'update'])->name('admin.monetary_information.update');
    Route::resource('/saledieng_months', SalediengMonthController::class)->names('admin.saledieng_months');
    Route::resource('/saledieng_families', SalediengFamiliesController::class)->names('admin.saledieng_families');
});
