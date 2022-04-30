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


$text = 'Hello! This is my first Laravel project.';
$title = 'Main page';

Route::get('/', function () {
    return view('welcome');
});


// Урок 1 Готово к проверке.
// Страница приветствия пользователей
Route::get('/hello', function () {
    return 'Hello page!';
});

// Страница для вывода одной новости
Route::get('/news/{id}', function (string $id) {
    return "News page - $id";
});

// Страница для вывода нескольких новостей
Route::get('/news', function () {
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

// Урок 2
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');


// Урок 2.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// 2.1. Страница приветствия. Небольшая статическая страница с некоторой информацией о будущем агрегаторе новостей.
Route::get('/info', function () {
    return view('info');
});

// Урок 2.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// 2.2. Страница категорий новостей. Данная страница должна выводить все категории из данных созданных в первом задании.
Route::get('/news/categories', [NewsController::class, 'categoriesNews'])
    ->name('categories.news');

// Урок 2.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// 2.3. Страница вывода новостей по конкретной категории. Переход на эту страницу должен
// осуществляться по ссылке на странице категорий. Ссылка должна содержать
// параметр, который будет определять какие именно новости будут выведены. Новости
// получать из метода созданного в первом задании.
Route::get('/news/categories/{id}', [NewsController::class, 'getNewsFromCategories'])
->where('id', '\d+')
->name('news.from.category');

// Урок 2.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// Страница авторизации. Страница должна содержать форму, в которой используются следующие элементы:
// 1. Поле ввода логина
// 2. Поле для ввода пароля
// 3. Чекбокс для указания, что следует “Запомнить меня”
// 4. Кнопка
Route::get('/auth', function () {
    return view('auth');
});

// Урок 2.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// Страница добавления новости. Страница должна содержать следующее элементы формы:
// 1. Поле для указания название новости
// 2. Поле для подробного описания новости
// 3. Поле для краткого описания новости
Route::get('news/add', function () {
    return view('news/add');
});
