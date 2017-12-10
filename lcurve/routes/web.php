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


Auth::routes();

//localization
Route::get('locale/{locale}','LocalizationController@index');

//welcome page
Route::view('/welcome', 'welcome');
Route::view('/', 'welcome');

//home page
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/calendar', 'EventController@showCalendar');

//calendar
Route::get('/calendar', 'EventController@showCalendar');

//User attach subjects
Route::get('/users/{id}/subjects', 'UserController@selectSubject');
Route::get('/users/{id}/addSubject', 'UserController@addSubject');
Route::view('users/profile', 'users.profile');

//Admin User view
Route::get('/users/view/{role}', 'UserViewController@userIndexView');

//Admin Permissions View
Route::get('/permissions/view/{permissibletype}', 'PermissionViewController@permissionIndexView');
Route::post('/permissions/{permission}/addUser', 'PermissionViewController@addUser');

//plug announcement
Route::post('/societies/{society}/announcements','AnnouncementController@storeUnderSociety');
Route::post('/sports/{sport}/announcements','AnnouncementController@storeUnderSport');

//topics for subjects
Route::post('/classSubjects/{classSubject}/topics','TopicController@store');
Route::put('/classSubjects/topics/update','TopicController@update');
Route::get('/classSubjects/topics/updatesequence','TopicController@updateSequence');


//plug comments to forums
Route::post('/forums/{forum}/comments','CommentController@store');
Route::put('/forums/{forum}/comments/{comment}/edit','CommentController@edit');
Route::post('/forums/{forum}/comments/{comment}/delete','CommentController@destroy');


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
Route::resource('tasks', 'TaskController');
Route::resource('quizzQuestions', 'QuizzQuestionController');
Route::resource('quizzQuestionOptions', 'QuizzQuestionOptionController');
Route::resource('quizzTopics', 'QuizzTopicController');
Route::resource('quizzes', 'QuizController');
Route::resource('downloads', 'DownloadController');


//wrong
Route::get('/selectSubject', 'UserController@selectSubject');
Route::get('/addSubject', 'UserController@addSubject');
Route::get('/studentsSubjects/index', function()
{
    return View::make('dash-left');
});


