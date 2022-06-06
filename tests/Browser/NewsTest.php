<?php

namespace Tests\Browser;

use App\Models\News;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateNewsForm()
    {
		$news = News::factory()->create();

		$this->browse(function (Browser $browser) use($news) {
			$browser->visit('/')
				->select('category_id', $news->category_d)
				->type('title', $news->title)
				->type('author', $news->author)
				->type('status', $news->status)
				->type('description', $news->description)
				->press('Сохранить')
				->assertRouteIs('admin.news.store');
		});
    }
}
