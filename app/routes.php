<?php

use App\Support\Router;

/*
    $url = Router::route('addUserForm');
    Router::get('', 'Home@index')->name('home');
    Router::get('users/add-user', 'User@addUserForm')->name('addUserForm');
    Router::post('users', 'User@store')->name('storeUser');
    Router::get('users/{id}/edit', 'User@edit')->name('editUser');

    $editUrl = Router::route('editUser', ['id' => 1]);
    Result: 'users/1/edit'
*/

Router::get('', 'User@index')->name('dashboard');
Router::get('login', 'User@loginView')->name('login.view');
Router::post('login', 'User@login')->name('login');
Router::get('users/add-user', 'User@addUserForm')->name('add.user.view');
Router::post('users/add-user', 'User@createUser')->name('add.user');
Router::get('users/all-users', 'User@allUsers')->name('all.users');
