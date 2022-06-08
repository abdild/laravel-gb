<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function __invoke(Request $request)
    {
        // $xml = App\Http\Controllers\Admin\XmlParser::load('https://news.yandex.ru/music.rss');

        $xml = XmlParser::load('https://news.yandex.ru/music.rss');

        $news = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'lastBuildDate' => [
                'uses' => 'lastBuildDate'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        dd($news);
    }
}
