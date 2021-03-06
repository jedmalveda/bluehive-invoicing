<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(["middleware" => 'auth'], function (){
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    // Invoice
    Route::get('/invoice', [InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class,'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class,'store'])->name('invoice.store');
    Route::get('/invoice/{id}/edit', [InvoiceController::class,'edit'])->name('invoice.edit');
    Route::put('/invoice/{id}', [InvoiceController::class,'update'])->name('invoice.update');
    Route::delete('/invoice', [InvoiceController::class,'destroy'])->name('invoice.delete');
});
