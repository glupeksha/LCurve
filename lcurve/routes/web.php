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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//resources
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
Route::resource('announcements', 'AnnouncementController');
Route::resource('subjects', 'SubjectController');
Route::resource('societies', 'SocietyController');
Route::resource('sections', 'SectionController');
Route::resource('classRooms', 'ClassRoomController');
Route::resource('lessons', 'LessonsController');
Route::resource('forums', 'ForumController');

//plug announcement
Route::post('/societies/{society}/announcements','AnnouncementController@storeUnderSociety');

Route::get('locale/{locale}','LocalizationController@index');

Route::view('/welcome', 'welcome');
Route::view('/profile', 'users.profile');
