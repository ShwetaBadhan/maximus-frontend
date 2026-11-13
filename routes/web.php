<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.index');
})->name('home');

Route::get('/jobs-list', function () {
    return view('frontend.pages.jobs-list');
})->name('jobs-list');

Route::get('/companies-list', function () {
    return view('frontend.pages.companies-list');
})->name('companies-list');

Route::get('/register', function () {
    return view('frontend.pages.register');
})->name('register');

Route::get('/login', function () {
    return view('frontend.pages.login');
})->name('login');

Route::get('/about-us', function () {
    return view('frontend.pages.about-us');
})->name('about-us');
