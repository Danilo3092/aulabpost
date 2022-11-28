<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

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

//public routes
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

//article's routes
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}/show', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{category}/category', [ArticleController::class, 'articlesForCategory'])->name('articles.category');
Route::get('/articles/{user}/user', [ArticleController::class, 'articlesForUser'])->name('articles.user');

// user routes
Route::get('/work-with-us', [PublicController::class, 'workWithUs'])->name('work.with.us');
Route::post('/user/send-role-request', [PublicController::class, 'sendRoleRequest'])->name('user.role.request');

//admin routes
Route::middleware('admin')->group(function(){
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/{user}/set-revisor', [AdminController::class, 'makeUserRevisor'])->name('admin.makeUserRevisor');
Route::get('/admin/{user}/set-admin', [AdminController::class, 'makeUserAdmin'])->name('admin.makeUserAdmin');    
Route::get('/admin/{user}/set-writer', [AdminController::class, 'makeUserWriter'])->name('admin.makeUserWriter');  
Route::get('/admin/{user}/reject-revisor', [AdminController::class, 'rejectRevisorRequest'])->name('admin.rejectRevisorRequest');
Route::get('/admin/{user}/reject-admin', [AdminController::class, 'rejectAdminRequest'])->name('admin.rejectAdminRequest');    
Route::get('/admin/{user}/reject-writer', [AdminController::class, 'rejectWriterRequest'])->name('admin.rejectWriterRequest');
Route::post('/tag/store',[AdminController::class, 'storeTag'])->name('tag.store');  
Route::post('/category/{category}/update',[AdminController::class, 'editCategory'])->name('category.edit');
Route::delete('/category/{category}/delete',[AdminController::class, 'deleteCategory'])->name('category.delete');
Route::post('/category/store',[AdminController::class, 'storeCategory'])->name('category.store');


});

//writer routes
Route::middleware('writer')->group(function(){
    Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/article/store', [ArticleController::class, 'store'])->name('article.store');
    Route::get('/article/dashboard', [ArticleController::class, 'articleDashboard'])->name('article.dashboard');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/article/{article}/update', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('article.delete');
    

});

//revisor routes
Route::middleware('revisor')->group(function(){
    Route::get('/revisor/dashboard', [RevisorController::class, 'revisorDashboard'])->name('revisor.dashboard');
    Route::get('/revisor/article/{article}/detail', [RevisorController::class, 'articleDetail'])->name('revisor.detail');
    Route::get('/revisor/article/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.accept');
    Route::get('/revisor/article/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.reject');
});

//ricerca articoli
Route::get('/article/search', [PublicController::class, 'searchArticle'])->name('search.articles');

//rotte per i tag//
Route::post('/tag/{tag}/update', [AdminController::class, 'editTag'])->name('tag.edit');
Route::delete('/tag/{tag}/delete', [AdminController::class, 'deleteTag'])->name('tag.delete');