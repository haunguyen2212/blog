<?php

namespace App\Providers;

use App\Libraries\Common;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('vendor.pagination.default');
        if(!$this->app->runningInConsole()){
            $common = new Common();

            $tags = $common->getTags();
            $categories = $common->getCategories();
            $trending_posts = $common->getTrendingPost();
            $latest_posts = $common->getLatestPost();
            $top_posts = $common->getTopPost();

            View::composer(['front.components.sidebar'], function($view) use ($tags, $categories, $trending_posts, $latest_posts){
                $view->with([
                    'trending_posts' => $trending_posts,
                    'latest_posts' => $latest_posts,
                    'categories' => $categories,
                    'tags' => $tags
                ]);
            });

            View::composer(['front.components.header'], function($view) use ($categories){
                $view->with(['categories' => $categories]);
            });

            View::composer(['front.components.footer'], function($view) use ($categories, $top_posts){
                $view->with([
                    'categories' => $categories,
                    'top_posts' => $top_posts,
                ]);
            });
        }  
    }
}
