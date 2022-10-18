<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\ProjectController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

    Route::resource('tasks','TaskController');
});

// Route::get('/userlist/index', [App\Http\Controllers\UserListController::class, 'index'])->name('list');
// Route::post('/userlist/create', [App\Http\Controllers\UserListController::class, 'create'])->name('cri');

Route::resource('user','UserListController');
Route::resource('project','ProjectController');


//add admin seeder for the admin account 