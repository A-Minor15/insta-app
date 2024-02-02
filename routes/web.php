<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\CategoriesController;

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

Auth::routes();
# Note: We need to protect our routes. Meaning, user can only
#access the routes if they are registered and login
# To protect the route, we need to add the "middleware" auth class

Route::group(['middleware'=>'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('index');
    Route::get('/', [HomeController::class, 'index'])->name('index'); // '/' --> root URI (localhost | 127.0.0.1)
    Route::get('people', [HomeController::class, 'search'])->name('search');

    ### Post ###
    # This route is going to open the create.blade.php post page
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    # This route is use to store post details into the posts table
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    # This route is use to open the show.blade.php (Show post page)]
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    # This route is use to open the edit.blade.php
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    ### comment ###
    Route::post('/comment/{post_id}/store', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/{id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');

    ### Profile ###
    Route::get('profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/{id}/followers', [ProfileController::class, 'followers'])->name('profile.followers');
    Route::get('profile/{id}/following', [ProfileController::class, 'following'])->name('profile.following');

    ### Like ###
    Route::post('like/{post_id}/store', [LikeController::class, 'store'])->name('like.store');
    Route::delete('like/{post_id}/destroy', [LikeController::class, 'destroy'])->name('like.destroy');

    ### Follow ###
    Route::post('follow/{id}/store', [FollowController::class, 'store'])->name('follow.store');
    Route::delete('follow/{id}/destroy', [FollowController::class, 'destroy'])->name('follow.destroy');

    ### Admin ###
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        ### Users ###
        Route::get('users', [UsersController::class, 'index'])->name('users'); // admin.users
        # Deactivate User
        Route::delete('users/{id}/deactivate', [UsersController::class, 'deactivate'])->name('users.deactivate');
        Route::patch('users/{id}/activate', [UsersController::class, 'activate'])->name('users.activate');
        // Route::post('users', [UsersController::class, 'search'])->name('users.search');

        ### Posts ###
        Route::get('posts', [PostsController::class, 'index'])->name('posts');
        Route::delete('posts/{post_id}/hide', [PostsController::class, 'hide'])->name('posts.hide');
        Route::patch('posts/{post_id}/unhide', [PostsController::class, 'unhide'])->name('posts.unhide');

        ### Categories ###
        Route::get('categories', [CategoriesController::class, 'index'])->name('categories');
        Route::post('categories/store', [CategoriesController::class, 'store'])->name('categories.store');
        Route::patch('categories/{id}/update', [CategoriesController::class, 'update'])->name('categories.update');
        Route::delete('categories/{id}/destroy', [CategoriesController::class, 'destroy'])->name('categories.destroy');
    });
});


