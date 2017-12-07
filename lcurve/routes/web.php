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
Route::resource('grades', 'GradeController');
Route::resource('classRooms', 'ClassRoomController');
Route::resource('forums', 'ForumController');
Route::resource('classSubjects', 'ClassSubjectController');
Route::resource('sports', 'SportController');
Route::resource('events', 'EventController');
Route::resource('studentSubjects', 'StudentSubjectController');
Route::resource('topics', 'TopicController');
Route::resource('tasks', 'TaskController');


//plug announcement
Route::post('/societies/{society}/announcements','AnnouncementController@storeUnderSociety');
Route::post('/sports/{sport}/announcements','AnnouncementController@storeUnderSport');

Route::get('/selectSubject', 'UserController@selectSubject');
Route::get('/addSubject', 'UserController@addSubject');

Route::get('/studentsSubjects/index', function()
{
    return View::make('dash-left');
});
Route::view('/studentsSubject', 'studentsSubject.index');
Route::view('/studentsubjects', 'studentsSubject.attach');

Route::get('/calendar', 'EventController@showCalendar');
Route::post('/topics/{classSubject}','TopicController@store');
Route::get('/updatesequence','TopicController@updateSequence');
Route::get('locale/{locale}','LocalizationController@index');

Route::view('/welcome', 'welcome');
Route::view('/profile', 'users.profile');
