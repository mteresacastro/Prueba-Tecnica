<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HobbyController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticatedSessionsController;
use App\Http\Controllers\Auth\RegisteredUserController;


Route::view('/', 'welcome')->name('home');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionsController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionsController::class, 'destroy'])->name('logout');

Route::middleware(['admin'])->group(function(){

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/dashboard', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/customers-by-hobby', [AdminController::class, 'selectHobby'])->name('admin.customers-by-hobby');Route::get('admin/generate-pdf', [PDFController::class, 'generatePDF'])->name('admin.generate-pdf');
    Route::get('/admin/createHobby',[HobbyController::class, 'create'])->name('admin.createHobby');
    Route::post('/admin/storeHobby',[HobbyController::class, 'store'])->name('admin.storeHobby');


    Route::get('/admin/{customer}', [AdminController::class, 'show'])->name('admin.show');
    Route::get('/admin/{customer}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/{customer}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{customer}', [AdminController::class, 'destroy'])->name('admin.destroy');

});


Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
Route::patch('/customer/dashboard', [CustomerController::class, 'update'])->name('customer.update');



