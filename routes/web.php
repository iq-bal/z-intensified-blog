<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

//get all blogs 
Route::get('/', [BlogController::class,'index']);

// form for creating blog post
Route::get('/blogs/create',[BlogController::class,'create']);

// store blog post
Route::post('/blogs',[BlogController::class,'store']); 

// show edit form 
Route::get('/blogs/{blog}/edit',[BlogController::class,'edit']);

// update blog
Route::put('/blogs/{blog}', [BlogController::class,'update']);

// delete a blog
Route::delete('/blogs/{blog}', [BlogController::class,'destroy']);

//get single blog
Route::get('/blogs/{blog}', [BlogController::class,'show']);


// show register/create form 
Route::get('/register',[UserController::class,'create']);

//show login form
Route::get('/login',[UserController::class,'login']);





