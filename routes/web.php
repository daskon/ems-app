<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::controller(CompanyController::class)->group(function(){
    Route::get('companies', 'index')->name('companies');
    Route::post('company-store', 'store')->name('store');
    Route::post('company-update', 'update')->name('update');
    Route::get('company','show')->name('company.show');
});

Route::controller(EmployeeController::class)->group(function(){
    Route::get('/employees', 'index')->name('employees');
    Route::get('/employee/create', 'create');
    Route::post('/employee', 'store');
});