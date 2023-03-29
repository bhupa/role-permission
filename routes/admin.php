<?php


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

        // Route::group(['prefix' => '/admin','as' => 'admin.'], function() {
           Route::group(['middleware'=>['auth','role']],function(){
                Route::get('/admin/dashboard', 'Admin\DashboardController@index');
                Route::get('admin/users', 'Admin\UsersController@index');
                Route::post('admin/add-roles','Admin\UsersController@addRoles');

                Route::get('/admin/roles', 'Admin\RolesController@index');

                Route::get('admin/create-role','Admin\RolesController@create');
                Route::post('admin/store-role','Admin\RolesController@store');
                Route::get('admin/edit-role/{id}','Admin\RolesController@edit');
                Route::post('admin/update-role/{id}','Admin\RolesController@update');
                Route::post('admin/delete-role','Admin\RolesController@destroy');
               
        });