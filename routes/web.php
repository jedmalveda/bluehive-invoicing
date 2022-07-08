<?php

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
    Route::view('dashboard', 'dashboard')->name('dashboard');
    // Invoice
    Route::get('/invoice', [InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class,'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class,'store'])->name('invoice.store');
    Route::get('/invoice/{id}/edit', [InvoiceController::class,'edit'])->name('invoice.edit');
});
