<?php

namespace App\Providers;

use App\Libraries\Common;
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
        if(!$this->app->runningInConsole()){
            $common = new Common();
            $data = [
                'recent_post' => $common->getRecentPost(),
                'categories' => $common->getCategories(),
                'tags'        => $common->getTags()
            ];
            View::composer(['front.sidebar'], function($view) use ($data){
                $view->with($data);
            });
        }  
    }
}
