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
        return "Новость с id = $id";
    }
}
