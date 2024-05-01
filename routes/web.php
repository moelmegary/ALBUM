<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\AlbumController;



/*
|--------------------------------------------------------------------------
| Web Routes
*/
Route::get('image-gallery', 'App\Http\Controllers\ImageGalleryController@index');
Route::post('image-gallery', 'App\Http\Controllers\ImageGalleryController@upload');
Route::delete('image-gallery/{id}', 'App\Http\Controllers\ImageGalleryController@destroy');
Route::get('home', 'App\Http\Controllers\ImageGalleryController@home')->name('main');
Route::get('add', 'App\Http\Controllers\ImageGalleryController@add');
Route::post('create', 'App\Http\Controllers\ImageGalleryController@saveAlbum');
Route::get('Aedit/{id}', 'App\Http\Controllers\ImageGalleryController@editAlbum');
Route::get('Aupdate/{id}', 'App\Http\Controllers\ImageGalleryController@updateAlbum');
Route::get('Adelete/{id}', 'App\Http\Controllers\ImageGalleryController@deleteAlbum');
Route::get('option/{id}', 'App\Http\Controllers\ImageGalleryController@optionDelete')->name('option');
