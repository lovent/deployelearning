<?php

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
    return view('/home');
});

//change-language
Route::group(['middleware' => 'locale'], function() {
    Route::get('change-language', 'HomeController@changeLanguage')->name('user.change-language');
    //home page
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@about')->name('about');

    Route::get('/class_detail/{id}' , 'ClassController@class_detail')->name('class_detail');
    Route::get('/classes', 'ClassController@classes')->name('classes');
    

    Route::get('/support', 'HomeController@support')->name('support');

    Route::get('/teacher', 'TeacherController@teacher')->name('teacher');
    Route::get('/teacher_detail/{id}' , 'TeacherController@teacher_detail')->name('teacher_detail');

    //list info
    Route::get('teachersearch', 'TeacherSearchController@index')->name('teachersearch');
    Route::get('teacherlist/{school_id}', 'TeacherSearchController@list')->name('teacherlist');
    Route::get('lophoclist/{tid}', 'LophocSearchController@list')->name('lophoclist');
    Route::get('bookinglist/{lid}', 'BookingController@list')->name('bookinglist');
    Route::get('usersearch', 'UserSearchController@index')->name('usersearch');
    Route::get('ratelist/{lid}', 'CommentController@list')->name('ratelist');

    Route::get('/settings/{id}' ,'UserController@settings')->name('settings');
    Route::post('/settings/{id}', 'UserController@edit_user')->name('edit_user');

    //comment
    Route::post('/comment/{id}', 'CommentController@postComment')->name('comment');

    // Phan loai hoc sinh
    Route::get('/baned/{uid}', 'UserController@baned')->name('baned');
    Route::get('/unbaned/{uid}', 'UserController@unbaned')->name('unbaned');
    Route::get('/banedstudent', 'UserController@banedstudent')->name('banedstudent');

    //Duyet dang ky
    Route::get('/addtocart/{id}', 'BookingController@addtocart')->name('addtocart');
    Route::get('/addbook/{id}', 'BookingController@addbook')->name('addbook');
    Route::get('/pendingbook', 'BookingController@pendingbook')->name('pendingbook');
    Route::get('/confirmbooking/{bid}', 'BookingController@confirm')->name('confirmbooking');

    //login logout
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('login', 'LoginController@checkLogin');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('register', 'LoginController@checkUserRegister');
    Route::post('register', 'LoginController@userRegister')->name('register');
});

//admin
Route::get('/admin', 'AdminController@index')->name('admin');
Route::resource('/adminuser', 'AdminUserController');
Route::resource('/adminteacher', 'AdminTeacherController');
Route::resource('/adminschool', 'AdminSchoolController');
Route::resource('/adminlophoc', 'AdminLophocController');
Route::resource('/adminbooking', 'AdminBookingController');
Route::resource('/adminrate', 'AdminRateController');
