<?php

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin', 'namespace' => 'App\Http\Controllers'], function(){
    Route::resource('company', 'CompanyController');
    Route::resource('item', 'ItemController');
    Route::controller(DocumentController::class)->group(function() {
        Route::get('/document/{type}', 'index')->name('document.index');
        Route::get('/document/{type}/create', 'create')->name('document.create');
        Route::post('/document/{type}/', 'store')->name('document.store');
        Route::get('/document/{type}/edit/{document}', 'edit')->name('document.edit');
        Route::patch('/document/{type}/update/{document}', 'update')->name('document.update');
        Route::delete('/document/{type}/delete/{document}', 'destroy')->name('document.delete');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
