<?php

use App\Support\Router;

Router::get('/', 'HomeController@index')->name('dashboard');

Router::get('/test', 'HomeController@data')->name('data');

// Auth 
Router::get('/login', 'AuthController@index')->name('auth.index');
Router::post('/login', 'AuthController@login')->name('auth.login');
Router::post('/logout', 'AuthController@logout')->name('auth.logout');

// Users
Router::get('/users', 'UserController@index')->name('users.index');
Router::get('/users-data', 'UserController@data')->name('users.data');
Router::get('/users/create', 'UserController@create')->name('users.create');
Router::post('/users', 'UserController@store')->name('users.store');
Router::get('/users/{id}', 'UserController@show')->name('users.show');
Router::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
Router::patch('/users/{id}', 'UserController@update')->name('users.update');
Router::delete('/users/{id}', 'UserController@delete')->name('users.delete');
