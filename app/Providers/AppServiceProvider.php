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
        //Register the repository and apply the decoration on it before is instantiated.
        $this->app->singleton(TweetRepository::class, function(){
            return new CacheTweetRepository(
                new APITweetRepository,
                $this->app['cache.store']
            );
        });
    }
}
