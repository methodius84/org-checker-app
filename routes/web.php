<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Organizations\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OrganizationController::class, 'list'])->middleware('auth')->name('dashboard');
Route::get('/create', [OrganizationController::class, 'create'])->middleware('auth')->name('create');
Route::post('/store', [OrganizationController::class, 'store'])->middleware('auth')->name('store');
Route::get('/{organization}/edit', [OrganizationController::class, 'editView'])->middleware('auth')->name('edit_form');
Route::patch('/edit', [OrganizationController::class, 'edit'])->middleware('auth')->name('update');
Route::delete('{organization}/delete', [OrganizationController::class, 'delete'])->middleware('auth')->name('delete');

Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login_attempt');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
