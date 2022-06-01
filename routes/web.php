<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\MailController;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => ['auth', 'has.permission']], function () {

    Route::get('/home', function () {
        return view('welcome');
    });
    Route::resource('departments', DepartmentController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('leaves', LeaveController::class);
    Route::post('accept-reject-leave/{id}', [LeaveController::class, 'acceptReject'])->name('accept.reject');
    Route::resource('notices', NoticeController::class);
    Route::get('/mail', [MailController::class, 'create'])->name('mails.create');
    Route::post('/mail', [MailController::class, 'store'])->name('mails.store');
});
