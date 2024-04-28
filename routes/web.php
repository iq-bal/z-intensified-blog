<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

//get all blogs 
Route::get('/', [BlogController::class,'index']);

//get single blog
Route::get('/blogs/{blog}', [BlogController::class,'show']);