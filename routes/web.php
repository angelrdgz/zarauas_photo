<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'SiteController@welcome');

Route::get('galeria/{id}', 'SiteController@gallery');

Route::get('login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginPost');

Route::middleware(['auth'])->group(function () {

    Route::post('logout', 'AuthController@logout')->name('logout');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
        Route::resource('albumes', 'Admin\AlbumController');
        Route::resource('galerias/{album_id}/fotos', 'Admin\GalleryController');
        Route::resource('usuarios', 'Admin\UserController');
        Route::resource('configuracion', 'Admin\ConfigurationController');
        Route::resource('configuracion/{album_id}/fotos', 'Admin\ConfigurationPhotoController');
    });
});
