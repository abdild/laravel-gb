<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use Illuminate\Http\Request;
use App\Services\Contract\Parser;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        // dd(
        //     $parser->setLink('http://news.yandex.ru/music.rss')
        //         ->parse()
        // );

        // Урок 10
        $urls = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
        ];

        foreach ($urls as $url) {
            dispatch(new NewsParsing($url));
        }

        return back()->with('success', 'Новости добавлены в очередь');
    }
}
