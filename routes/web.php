<?php

use Illuminate\Support\Facades\Route;

 
 

Route::get('/', function () {
    return view('welcome',['type_menu' => 'dashboard'] );
});
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/home', function () {
        return view('pages.blank-page',['type_menu' => 'dashboard'] );
    })->name('home');
});
// Route::get('/login', function () {
//     return view('auth.login',['type_menu' => 'dashboard'] );
// });
// Route::get('/register', function () {
//     return view('auth.register',['type_menu' => 'dashboard'] );
// });
// Route::get('/verify', function () {
//     return view('auth.verify',['type_menu' => 'dashboard'] );
// });
// Route::get('/forgot', function () {
//     return view('auth.forgot',['type_menu' => 'dashboard'] );
// });