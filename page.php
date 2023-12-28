<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoGalleryController;

Route::get('/photo-gallery', [PhotoGalleryController::class, 'index'])->name('photo_gallery.index');
Route::post('/photo-gallery/upload', [PhotoGalleryController::class, 'upload'])->name('photo_gallery.upload');




Route::get('/', function () {
    return view('welcome');
});

