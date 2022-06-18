<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // На уроке 10 это удаляем:
    // public function getNews(int $id = null): array
    // {
    //     $news = [
    //         [
    //             'id' => 1,
    //             'title' => 'Post 1',
    //             'category' => $this->getCategoriesNews()[0],
    //             'author' => 'Author 1',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 1',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 2,
    //             'title' => 'Post 2',
    //             'category' => $this->getCategoriesNews()[0],
    //             'author' => 'Author 2',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 2',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 3,
    //             'title' => 'Post 3',
    //             'category' => $this->getCategoriesNews()[0],
    //             'author' => 'Author 3',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 3',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 4,
    //             'title' => 'Post 4',
    //             'category' => $this->getCategoriesNews()[0],
    //             'author' => 'Author 4',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 4',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 5,
    //             'title' => 'Post 5',
    //             'category' => $this->getCategoriesNews()[1],
    //             'author' => 'Author 5',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 5',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 6,
    //             'title' => 'Post 6',
    //             'category' => $this->getCategoriesNews()[1],
    //             'author' => 'Author 6',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 6',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 7,
    //             'title' => 'Post 7',
    //             'category' => $this->getCategoriesNews()[1],
    //             'author' => 'Author 7',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 7',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 8,
    //             'title' => 'Post 8',
    //             'category' => $this->getCategoriesNews()[1],
    //             'author' => 'Author 8',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 8',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 9,
    //             'title' => 'Post 9',
    //             'category' => $this->getCategoriesNews()[2],
    //             'author' => 'Author 9',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 9',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 10,
    //             'title' => 'Post 10',
    //             'category' => $this->getCategoriesNews()[2],
    //             'author' => 'Author 10',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 10',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 11,
    //             'title' => 'Post 11',
    //             'category' => $this->getCategoriesNews()[2],
    //             'author' => 'Author 11',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 11',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 12,
    //             'title' => 'Post 12',
    //             'category' => $this->getCategoriesNews()[2],
    //             'author' => 'Author 12',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 12',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 13,
    //             'title' => 'Post 13',
    //             'category' => $this->getCategoriesNews()[3],
    //             'author' => 'Author 13',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 13',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 14,
    //             'title' => 'Post 14',
    //             'category' => $this->getCategoriesNews()[3],
    //             'author' => 'Author 14',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 14',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 15,
    //             'title' => 'Post 15',
    //             'category' => $this->getCategoriesNews()[3],
    //             'author' => 'Author 15',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 15',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 16,
    //             'title' => 'Post 16',
    //             'category' => $this->getCategoriesNews()[3],
    //             'author' => 'Author 16',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 16',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 17,
    //             'title' => 'Post 17',
    //             'category' => $this->getCategoriesNews()[4],
    //             'author' => 'Author 17',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 17',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 18,
    //             'title' => 'Post 18',
    //             'category' => $this->getCategoriesNews()[4],
    //             'author' => 'Author 18',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 18',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 19,
    //             'title' => 'Post 19',
    //             'category' => $this->getCategoriesNews()[4],
    //             'author' => 'Author 19',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 19',
    //             'created_at' => now('Europe/Moscow')
    //         ], [
    //             'id' => 20,
    //             'title' => 'Post 20',
    //             'category' => $this->getCategoriesNews()[4],
    //             'author' => 'Author 20',
    //             'image' => Factory::create()->imageUrl(),
    //             'description' => 'Description 20',
    //             'created_at' => now('Europe/Moscow')
    //         ],
    //     ];

    //     if ($id) {
    //         $id = $id - 1;
    //         return [
    //             'id' => $id,
    //             'title' => $news[$id]['title'],
    //             'category' => $news[$id]['category'],
    //             'author' => $news[$id]['author'],
    //             'image' => $news[$id]['image'],
    //             'description' => $news[$id]['description'],
    //             'created_at' => $news[$id]['created_at']
    //         ];
    //     }



    //     // $news = [];
    //     // $faker = Factory::create();
    //     // $num = random_int(0, 5);

    //     // if ($id) {
    //     //     return [
    //     //         'id' => $id,
    //     //         'title' => $faker->jobTitle(),
    //     //         'category' => $this->getCategoriesNews()[$num],
    //     //         'author' => $faker->name(),
    //     //         'image' => $faker->imageUrl(),
    //     //         'description' => $faker->text(150),
    //     //         'created_at' => now('Europe/Moscow')
    //     //     ];
    //     // }

    //     // for ($i = 0; $i < 50; $i++) {
    //     //     $num = random_int(0, 5);
    //     //     $news[] = [
    //     //         'id' => $i + 1,
    //     //         'title' => $faker->jobTitle(),
    //     //         'category' => $this->getCategoriesNews()[$num],
    //     //         'author' => $faker->name(),
    //     //         'image' => $faker->imageUrl(),
    //     //         'description' => $faker->text(150),
    //     //         'created_at' => now('Europe/Moscow')
    //     //     ];
    //     // }

    //     return $news;
    // }

    // Урок 1.
    // Задание 1.
    // Добавить в родительский контроллер методы для хранения данных, которые будет
    // возвращать массивы. Массивы должны содержать информацию о категориях новостей
    // (минимум 5), и новостях (минимум 4 для каждой категории).
    public function getCategoriesNews(int $category = null): array
    {
        $categories = ['Спорт', 'В стране', 'В мире', 'В городе', 'Администрация'];

        // $categories = [];
        // $faker = Factory::create();

        // for ($i = 1; $i <= 6; $i++) {
        //     $categories[] = [
        //         'category' => $faker->text(15)
        //     ];
        // }

        if($category > 4) {
            abort(404);
        };

        if ($category != null) {
            $selectedNews = [];
            $news_all = $this->getNews();
            foreach ($news_all as $news) {
                if ($news['category'] == $categories[$category]) {
                    $selectedNews[] = $news;
                }
            }
            return $selectedNews;
        }

        return $categories;
    }
}
