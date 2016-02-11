<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    /*
     * Login Routes
     */
    Route::get('/', ['as' => 'home','uses' => 'HomeController@home']);

    Route::get('/login', 'Auth\AuthController@login');
    Route::post('/login', ['as' => 'post-login', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('/logout', 'Auth\AuthController@logout');

    /*
     * Admin Routes
     */

    Route::group(['namespace' => 'Admin','as' => 'admin::','prefix' => 'admin'],function() {

        /*
         * @Resource : User
         */

        Route::get('/users',[
            'middleware' => ['permission:users-can-view|users-can-edit|users-can-create-new'],
            'as' => 'users.index', 'uses' => 'UserController@index']);

        Route::get('/user/create', [
            'middleware' => ['permission:users-can-create-new'],
            'as' => 'user.create', 'uses' => 'UserController@create']);

        Route::post('/user', [
            'middleware' => ['permission:users-can-create-new'],
            'as' => 'user.store', 'uses' => 'UserController@store']);

        Route::get('/user/{id}', [
            'middleware' => ['permission:users-can-view|users-can-edit|users-can-create-new'],
            'as' => 'user.show', 'uses' => 'UserController@show']);

        Route::get('/user/{id}/edit', [
            'middleware' => ['permission:users-can-edit|users-can-create-new'],
            'as' => 'user.edit', 'uses' => 'UserController@edit']);

        Route::post('/user/{id}', [
            'middleware' => ['permission:users-can-edit|users-can-create-new'],
            'as' => 'user.update', 'uses' => 'UserController@update']);

        Route::post('/user/{id}/destroy', [
            'middleware' => ['permission:users-can-edit|users-can-create-new'],
            'as' => 'user.destroy', 'uses' => 'UserController@destroy']);

        Route::get('/users/change-password',[
            'middleware' => ['permission:change-password-can-edit'],
            'as' => 'users.password', 'uses' => 'UserController@changePassword']);

        Route::post('/user/{id}/update-password', [
            'middleware' => ['permission:change-password-can-edit'],
            'as' => 'user.password.update', 'uses' => 'UserController@updatePassword']);

        /*
         * @Resource: Permission
         */

        Route::get('/role/{role}/permissions', [
            'middleware' => ['permission:update-menu-permissions-can-view|update-menu-permissions-can-edit'],
            'as' => 'role.permission', 'uses' => 'PermissionController@getRolePermissions']);

        Route::post('/role/{role}/permissions', [
            'middleware' => ['permission:update-menu-permissions-can-edit'],
            'as' => 'role.permission.update', 'uses' => 'PermissionController@updateRolePermissions']);

        /*
         * @Resource : Roles
         */

        Route::get('/roles',[
            'middleware' => ['permission:roles-can-view|roles-can-edit|roles-can-create-new'],
            'as' => 'roles.index', 'uses' => 'RoleController@index']);

        Route::get('/role/create', [
            'middleware' => ['permission:roles-can-create-new'],
            'as' => 'role.create', 'uses' => 'RoleController@create']);

        Route::post('/role', [
            'middleware' => ['permission:roles-can-create-new'],
            'as' => 'role.store', 'uses' => 'RoleController@store']);

        Route::get('/role/{id}', [
            'middleware' => ['permission:roles-can-view|roles-can-edit|roles-can-create-new'],
            'as' => 'role.show', 'uses' => 'RoleController@show']);

        Route::get('/role/{id}/edit', [
            'middleware' => ['permission:roles-can-edit|roles-can-create-new'],
            'as' => 'role.edit', 'uses' => 'RoleController@edit']);

        Route::post('/role/{id}', [
            'middleware' => ['permission:roles-can-edit|roles-can-create-new'],
            'as' => 'role.update', 'uses' => 'RoleController@update']);

        Route::post('/role/{id}/destroy', [
            'middleware' => ['permission:roles-can-edit|roles-can-create-new'],
            'as' => 'role.destroy', 'uses' => 'RoleController@destroy']);


    });

});
