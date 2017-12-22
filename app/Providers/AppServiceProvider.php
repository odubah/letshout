<?php

namespace App\Providers;

use App\Repositories\Twitter\CacheTweetRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Twitter\TweetRepository;
use App\Repositories\Twitter\APITweetRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TweetRepository::class, function(){
            return new CacheTweetRepository(
                new APITweetRepository,
                $this->app['cache.store']
            );
        });
    }
}
