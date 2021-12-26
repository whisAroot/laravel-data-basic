<?php

use App\Http\Controllers\AddEmployeeController;
use App\Http\Controllers\EditEmployeeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MailSender;
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

Route::get('/', [EmployeeController::class, 'firstpage'])->name('employee');
Route::get('/manage/add', [AddEmployeeController::class, 'firstpage'])->name('employee.add');
Route::post('/manage/add', [AddEmployeeController::class, 'store'])->name('employee.store');
Route::get('/manage/edit/{id}', [EditEmployeeController::class, 'firstpage'])->name('employee.edit');
Route::post('/manage/edit', [EditEmployeeController::class, 'update'])->name('employee.update');
Route::get('/manage/delete/{id}', [EmployeeController::class, 'delete'])->name('employee.delete');
Route::get('/mailsend', [MailSender::class, 'sendmail']);