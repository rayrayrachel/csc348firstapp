<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "This is the /home page";
});

Route::get('/blog', function () {
    return "This is the /blog page";
});