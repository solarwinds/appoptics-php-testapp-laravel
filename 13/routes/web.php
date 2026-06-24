<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TestController;

Route::get('/nosetest', [TestController::class, 'nosetest']);
Route::get('/nosetesterror', [TestController::class, 'nosetestError']);