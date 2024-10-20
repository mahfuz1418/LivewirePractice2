<?php

use App\Livewire\TestOne;
use App\Livewire\TestTwo;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/todo', function () {
    return view('todo');
});

Route::get('/data-table', function () {
    return view('data-table');
});


Route::get('/test-one', TestOne::class);
Route::get('/test-two', TestTwo::class);

