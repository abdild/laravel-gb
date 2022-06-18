<?php

namespace App\Services;

use App\Services\Contract\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function parse(): void
    {
        // $xml = App\Http\Controllers\Admin\XmlParser::load('https://news.yandex.ru/music.rss');

        $xml = XmlParser::load($this->link); // Обрати внимание, почему-то не работает по протоколу https. Возможно потому что из КСПД/
        // $xml = XmlParser::load(public_path('https://news.yandex.ru/music.rss'));

        // Урок 10
        // return $xml->parse([
        $data = $xml->parse([
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

        // Урок 10
        $e = explode("/", $this->link);
        $fileName = end($e);

        $jsonEncode = json_encode($data);

        Storage::append('news/' . $fileName, $jsonEncode);

        // dd($news);

        // $xml = XmlParser::load($this->link);

        // $data = $xml->parse([
        //     'title' => [
        //         'uses' => 'channel.title'
        //     ],
        //     'link' => [
        //         'uses' => 'channel.link'
        //     ],
        //     'description' => [
        //         'uses' => 'channel.description'
        //     ],
        //     'image' => [
        //         'uses' => 'channel.image.url'
        //     ],
        //     'lastBuildDate' => [
        //         'uses' => 'lastBuildDate'
        //     ],
        //     'news' => [
        //         'uses' => 'channel.item[title,link,guid,description,pubDate]'
        //     ]
        // ]);

        // $e = explode("/", $this->link);
        // $fileName = end($e);

        // $jsonEncode = json_encode($data);

        // Storage::append('news/' . $fileName, $jsonEncode);
    }
}
