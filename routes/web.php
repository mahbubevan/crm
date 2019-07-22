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


//Company Routes
Route::group(['middleware'=>['auth']],function(){
    Route::get('/company','CompanyController@index')->name('company.index');
    Route::get('/company/create','CompanyController@create')->name('company.create')->middleware('check.role');
    Route::post('/company','CompanyController@store')->name('company.store');
    Route::get('/company/{company}','CompanyController@show')->name('company.show');
    Route::get('/company/{company}/edit','CompanyController@edit')->name('company.edit');
    Route::patch('/company/{company}','CompanyController@update')->name('company.update');
    Route::delete('/company/{company}','CompanyController@destroy')->name('company.destroy');
});

#Employee Routes
Route::group(['middleware'=>['auth']],function(){
    Route::get('/employee','EmployeeController@index')->name('employee.index');
    Route::get('/employee/create','EmployeeController@create')->name('employee.create');
    Route::post('/employee','EmployeeController@store')->name('employee.store');
    Route::get('/employee/{employee}','EmployeeController@show')->name('employee.show');
    Route::get('/employee/{employee}/edit','EmployeeController@edit')->name('employee.edit');
    Route::patch('/employee/{employee}','EmployeeController@update')->name('employee.update');
    Route::delete('/employee/{employee}','EmployeeController@destroy')->name('employee.destroy');
});
