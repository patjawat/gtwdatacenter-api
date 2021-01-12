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
Auth::routes(['register' => false]);
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
});

Route::middleware('auth')->group(function () {

    Route::group(["namespace"=>"App\Http\Controllers"],function() {
    
        Route::resource('version', VersionController::class);
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('dropzone', [ App\Http\Controllers\DropzoneController::class, 'dropzone' ]);
        Route::post('dropzone/store', [ App\Http\Controllers\DropzoneController::class, 'dropzoneStore' ])->name('dropzone.store');
        Route::resource('admin/posts', 'Admin\PostsController');

    });
});