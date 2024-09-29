<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class,'index']);

Route::get('/add', [TaskController::class,'store_view']);

Route::get('/edit/{id}', [TaskController::class,'edit_view']);

Route::post('/edit/{id}', [TaskController::class,'edit']);

Route::post('api/edit/{id}', [TaskController::class,'edit_api']);

Route::post('/delete/{id}',[TaskController::class,'delete']);

Route::post('/create', [TaskController::class,'store']);
