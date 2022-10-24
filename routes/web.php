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
Route::get('/register', function() {

    return redirect('/login');
});

Route::post('/register', function() {

    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    if (Route::prefix('admin')) {
        Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

            Route::resource('tasks','TaskController');
            Route::resource('project','ProjectController');
            
            
            });
    
    }
   

    
    Route::get('publicUser/index', [App\Http\Controllers\PublicUserController::class, 'index']);
    // Route::resource('tasks', 'TaskController', [
    //     'only' => ['index', 'show']
    // ]);



Route::resource('user','UserListController');










//add admin seeder for the admin account 