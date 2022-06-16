<?php

use App\Http\Controllers\Order;
use App\Http\Controllers\Feedback;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\NewsController as NewsController;
use App\Http\Controllers\IndexController as IndexController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Account\IndexController as AccountIndexController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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

// Урок 8
Route::group(['middleware' => 'auth'], function () {
    // Урок 8
    Route::get('/account', AccountIndexController::class)
        ->name('account');
    // Группировка роутов для админской панели
    // 'prefix' => 'admin' - добавляет префикс 'admin' в браузерной строке
    // 'as' => 'admin.' - добавляет для данной группировки уникальность нейминга. Чтобы , например, не путалось с news.show, будет admin.news.show
    // Проверка всех имен: 'php artisan route:list'
    Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.'], function () { // 'middleware' => 'admin' - admin - это имя, которое прописано в файле Http/Kernel.php в блоке protected $routeMiddleware
        // Урок 9 или 8.
        Route::match(
            ['post', 'get'],
            '/profile',
            [
                'uses' => 'ProfileController@update',
                'as' => 'updateProfile'
            ]
        );

        // ------ Предыдущие уроки
        Route::get('/', AdminController::class)
            ->name('index');
        // Урок 9
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
    });
});


Route::get('/', IndexController::class)
    ->name('index');

// Урок 4.
// Задание 1.
// Создать формы для получения данных от пользователя
// Route::get('/feedback', [IndexController::class, 'feedback'])
//     ->name('feedback'); НЕПРАВИЛЬНО!

Route::resource('/feedback', Feedback::class);
Route::resource('/order', Order::class);

// Урок 2
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

// Урок 8 Сессии
Route::get('/sessions', function () {
    session()->put('test', "Test data"); // вариант 1
    // session(['test' => 'Test data']); // вариант 2

    if (session()->has('test')) {
        dd(session()->all()); // Показать все Сессии
        dd(session()->get('test')); // Показать конкретную сессию
        dd(session()->remove('test')); // Удалить конкретную сессию
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/{driver}/redirect', [SocialController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social.redirect');
    Route::any('/auth/{driver}/callback', [SocialController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social.callback');
});
