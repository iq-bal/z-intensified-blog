<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

//get all blogs 
Route::get('/', [BlogController::class,'index']);

