<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Organizations\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::controller(OrganizationController::class)->group(function () {
    Route::get('/', 'list')->name('dashboard');
    Route::prefix('organizations')->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{uuid}/edit', 'editView')->name('edit');
        Route::patch('/edit', 'edit')->name('update');
        Route::delete('/{uuid}', 'delete')->name('delete');
        Route::get('/{uuid}/check', 'check')->name('check');
    });
})->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/login', 'login')->name('login_attempt');
    Route::get('/logout', 'logout')->name('logout');
});

