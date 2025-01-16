<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/', 'IndexController');

});



Auth::routes();


