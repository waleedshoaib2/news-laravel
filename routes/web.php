<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ArticleController::class, 'mainpage'])->name('mainpage');
Route::get('/articles', [ArticleController::class, 'dashboard'])->name('dashboard');


Route::get('update/{article}', [
    ArticleController::class,
    'updatearticle'
])->name('articles.find');

Route::post(
    '/articleupdate/{article}',
    [ArticleController::class, 'updatedArticle']
)->name('article.update');

Route::get(
    '/category/create',
    [CategoryController::class, "createpage"]
)->name('category.createpage');

Route::get(
    'category/menu',
    [CategoryController::class, "mainpage"]
)->name("category.mainpage");

// for creating categories

Route::post(
    '/category/create',
    [CategoryController::class, "create"]
)->name('category.create');


Route::get(
    '/category/{id}',
    [CategoryController::class, "updatecategory"]
)->name('category.updatepage');





Route::post(
    'categoryupdate/{categoryid}',
    [
        CategoryController::class,
        'updatedcategory'
    ]
)->name('update.category');


Route::post(

    '/categorydelete/{id}',
    [
        CategoryController::class,
        'delete'
    ]
)->name('category.destroy');





Route::get('/createpage', [ArticleController::class, 'loadCreatepage'])->name('loadCreatepage');
Route::get('/UserRoleMenu', [UserRoleController::class, 'LoadUserCreatepage'])->name('userRole.dashboard');
Route::get('articles/{article}', [ArticleController::class, 'articleRead'])->name('article.read');

Route::post('/articles/{id}', [ArticleController::class, 'delete'])->name('articles.destroy');
Route::post('/artices/create', [ArticleController::class, 'createArticle'])->name('article.create');



Route::post('/articles/{article}/comments', [CommentController::class, 'postComment'])->name('comment.post');
Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comment.delete');
Route::put('/comment/{comment}/update', [CommentController::class, 'updateComment'])->name('comment.update');
