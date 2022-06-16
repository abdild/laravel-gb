<?php

namespace App\Providers;

use App\Queries\QueryBuilder;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Queries\QueryBuilderNews;
use App\Services\Contract\Parser;
use App\Services\Contract\Social;
use Illuminate\Pagination\Paginator;
use App\Queries\QueryBuilderCategories;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // QueryBuilders
        $this->app->bind(QueryBuilder::class, QueryBuilderNews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderCategories::class);

        // Урок 9
        // Services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
