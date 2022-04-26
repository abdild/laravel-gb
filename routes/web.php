<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$text = 'Hello! This is my first Laravel project.';$title = 'Main page';

Route::get('/', function () {
    return view('welcome');
});


// Lesson 1
// Страница приветствия пользователей
Route::get('/hello', function() {
    return 'Hello page!';
});

// Страница с информацией о проекте
Route::get('/info', function() {
    return 'Info page!';
});

// Страница для вывода одной новости
Route::get('/news/{id}', function( string $id) {
    return "News page - $id";
});

// Страница для вывода нескольких новостей
Route::get('/news', function() {
    return 'News page!';
});

Route::get('/test', function () use ($text, $title) {
    return //view('welcome');
    <<<php
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>$title</title>
</head>
<body>
    <h1>$text</h1>
</body>
</html>
php;
});

// Lesson 2
Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);



