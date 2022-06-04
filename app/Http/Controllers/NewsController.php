<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $model = app(News::class);
        $news = $model->getNews();
        // $news = $this->getNews();
        // dd($news);
        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        if ($id > 20) {
            abort(404);
        };

        $model = app(News::class);
        $news = $model->getOneNews($id);
        // $news = $this->getNews($id);
        return view('news.show', [
            'news' => $news
        ]);
    }

    public function categoriesNews()
    {
        $categories = $this->getCategoriesNews();
        return view('news.categories_news', [
            'categoryList' => $categories
        ]);
    }

    public function getNewsFromCategories(int $category)
    {
        $news = $this->getCategoriesNews($category);
        return view('news/news_from_category', [
            'newsList' => $news
        ]);
    }
}
