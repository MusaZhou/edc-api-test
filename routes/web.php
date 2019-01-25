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

Route::get('/', 'HomeController@index')->name('index');

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin_register', 'Auth\AdminController@showRegisterAdminForm')->name('admin_register_view')->middleware('permission:create.users');
Route::post('/admin_register', 'Auth\AdminController@registerAdmin')->name('admin_register')->middleware('permission:create.users');
Route::get('/institution_register', 'Auth\AdminController@showRegisterInstitutionForm')->name('institution_register_view')->middleware('permission:manage.institutions');
Route::post('/institution_register', 'Auth\AdminController@registerInstitution')->name('institution_register')->middleware('permission:manage.institutions');
Route::get('/institution_index', 'InstitutionController@index')->name('institution_index')->middleware('permission:manage.institutions');
Route::post('/get_institution_data', 'InstitutionController@getInstitutionData')->name('get_institution_data')->middleware('permission:manage.institutions');