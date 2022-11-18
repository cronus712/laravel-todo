<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/profile', function() {
//     return view('profile');
// });

Auth::routes();
Route::get('/register', function() {

    return redirect('/login');
});

Route::post('/register', function() {

    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home','HomeController@upload');




Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {

 Route::resource('tasks','TaskController');
 Route::resource('project','ProjectController');
 Route::resource('user','UserListController');

 });
    
    
   

 Route::prefix('publicuser')->middleware(['auth', 'isUser'])->group(function(){
 Route::get('index', [App\Http\Controllers\PublicUserController::class, 'index'])->name('publicuser.index');;
 Route::get('show/{user}',  [App\Http\Controllers\PublicUserController::class, 'show'])->name('publicuser.show');;
    
 });
       
 Route::get('/accessdenied', function() {
 
    return view('errors.accessdenied');
    
});

Route::prefix('profile')->group(function() {
    Route::get('/edit/', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});



// Route::get('/sidenav', function(){
//     return view('sidenav');
// });
   
    // Route::resource('tasks', 'TaskController', [
    //     'only' => ['index', 'show']
    // ]);









//fix block display in edit show blades

//add admin seeder for the admin account 