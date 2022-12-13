<?php

/*
|--------
| Web Routes
|--------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



namespace Carbon;

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index')->name('home');

// Route::get('/{about}', function ($about) {
    //     return view('about',['about'=>$about]);
    // });
    // Route::get('/user/{id}', "UserController@show");
    // Route::view('about','/about');
    
    Route::get('/welcome', function () {
    return view('welcome');
    });
    
    Auth::routes();
    
    Route::get('student', 'StudentController@index')->name('student');
    Route::get('students/list', 'StudentController@getStudents')->name('students.list');
    Route::get('edit-student/{id}', 'StudentController@editStudents');
    Route::get('/add-student', 'StudentController@addStudents');
    Route::get('delete-student/{id}', 'StudentController@deleteStudents');
    Route::post('/update-student', 'StudentController@updateStudents');
    Route::post('/create-student', 'StudentController@createStudents');
    
    
// Route::get('/time', function () {
//     $dt = new Carbon();
//     echo "<br>";
//     echo $dt;
//     echo "<br>";
//     echo $new->diffForHumans();
//     echo "<br>";
//     echo $new->diffInMinutes($dt);
//     echo "<br>";
//     dd(json_encode($dt));
// });