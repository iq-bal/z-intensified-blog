<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

//get all blogs 
Route::get('/', [BlogController::class,'index']);

// form for creating blog post
Route::get('/blogs/create',[BlogController::class,'create']);

// store blog post
Route::post('/blogs',[BlogController::class,'store']); 

//get single blog
Route::get('/blogs/{blog}', [BlogController::class,'show']);