<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = $this->getNews();
        // dd($news);
        return view('news/index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        if($id > 20) {
            abort(404);
        };
        
        $news = $this->getNews($id);        
        return view('news/show', [
            'news' => $news
        ]);
    }

    public function categoriesNews()
    {
        $categories = $this->getCategoriesNews();
        return view('news/categories_news', [
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
