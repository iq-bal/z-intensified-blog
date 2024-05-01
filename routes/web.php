<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;

//get all blogs 
Route::get('/', [BlogController::class,'index']);

// form for creating blog post
Route::get('/blogs/create',[BlogController::class,'create'])->middleware('auth');

// store blog post
Route::post('/blogs',[BlogController::class,'store'])->middleware('auth'); 

// show edit form 
Route::get('/blogs/{blog}/edit',[BlogController::class,'edit'])->middleware('auth');

// update blog
Route::put('/blogs/{blog}', [BlogController::class,'update'])->middleware('auth');

// delete a blog
Route::delete('/blogs/{blog}', [BlogController::class,'destroy'])->middleware('auth');

// post a comment 
Route::post('/blogs/{blog}/comment',[CommentController::class,'store']);

// manage listing route
Route::get('/blogs/manage',[BlogController::class,'manage'])->middleware('auth');

//get single blog
Route::get('/blogs/{blog}', [BlogController::class,'show']);

// show register/create form 
Route::get('/register',[UserController::class,'create'])->middleware('guest');

// create new user
Route::post('/users',[UserController::class, 'store']);

// Log User out 
Route::post('/logout',[UserController::class,'logout'])->middleware('auth')->middleware('auth');

//show login form
Route::get('/login',[UserController::class,'login'])->middleware('guest')->name('login');

// log in user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

