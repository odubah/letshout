<?php

namespace App\Repositories\Twitter;

use Illuminate\Contracts\Cache\Repository as Cache;

class CacheTweetRepository implements TweetRepository
{
    /**
     * @var TweetRepository
     */
    private $repository;
    /**
     * @var Cache
     */
    private $cache;

    /**
     * Use a decorator patter in our repository patter to make our code more flexible
    if the app grows in time.
     */
    public function __construct(TweetRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function get_all_strings_to_shout(array $request)
    {
        //generate unique hash cache name per request
        $hashed_cache = md5($request['username'].'#'.$request['number_of_last_tweets']);
        //if the request has been cached then we return it if not we generate that repository cache and
        //return it.
        return $this->cache->remember($hashed_cache, env('CACHE_LIFETIME'), function () use ($request){
            return $this->repository->get_all_strings_to_shout($request);
        });
    }

}