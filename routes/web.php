<?php

use App\Livewire\Counter;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/user', function() {
    return view('users');
});
Route::get('/counter', Counter::class);
Route::get('/', function () {
    return view('welcome');
});
