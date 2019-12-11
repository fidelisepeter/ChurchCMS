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
use App\Member;

Route::get('/', function () {
    // User::find(1)->notify(new TestingNotification);
    return view('welcome');
});

Route::get('/insights', function() {
    return view('insights');
});

// Route::get('/messaging', function() {
//     $members = Member::all();
//     return view('messaging')->with('members', $members);
// });

Route::get('/notifications', function() {
    return view('notifications');
});

Route::get('/reports', function(){
    return view('reports');
});
Route::get('/reportmembers', 'ReportController@members');
Route::get('/reportattendance', 'ReportController@attendance');
Route::get('/reportincome', 'ReportController@income');
Route::get('/reportmembers/pdf','ReportController@export_pdfmembers');
Route::get('/reportincome/pdf','ReportController@export_pdfincome');
Route::get('/reportattendance/pdf','ReportController@export_pdfattendance');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');
Route::post('updateprofile','UserController@update_profile');

Route::get('importmembers', 'MembersController@importFile');
Route::post('import', 'MembersController@importExcel');

Route::resource('sermons', 'SermonsController');
Route::resource('messaging', 'MessagingController');
Route::resource('services', 'ServicesController');
Route::resource('roles', 'RolesController');
Route::resource('conferences', 'ConferencesController');
Route::resource('addressbook', 'AddressesController');
Route::resource('members', 'MembersController');
Route::resource('expense', 'ExpenseController');
Route::resource('income', 'IncomeController');
Route::resource('attendance', 'AttendanceController');
Route::resource('departments', 'DepartmentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::prefix('admin')->group(function() {
//     Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
//     Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
//     Route::get('/', 'AdminController@index')->name('admin.dashboard');
// });



// Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
// Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
// Route::get('/admin', 'AdminController@index')->name('admin.dashboard');


// Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
// Route::POST('admin', 'Admin\LoginController@login');
// Route::POST('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
// Route::GET('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
// Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset');
// Route::GET('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm');