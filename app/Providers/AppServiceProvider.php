<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilder\CategoriesBuilder;
use App\QueryBuilder\NewsBuilder;
use App\QueryBuilder\QueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsBuilder::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
