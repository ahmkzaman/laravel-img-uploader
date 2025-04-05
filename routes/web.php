<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/image-upload', [ImageController::class, 'index']);
Route::post('/image-upload', [ImageController::class, 'store'])
    ->name('image.store');
Route::delete('/image-upload', [ImageController::class, 'destroy'])
    ->name('image.delete');
