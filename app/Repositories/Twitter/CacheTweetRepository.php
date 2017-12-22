<?php

namespace App\Repositories\Twitter;

use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Facades\Hash;

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

    public function __construct(TweetRepository $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function get_all_strings_to_shout(array $request)
    {
        $hashed_cache = md5($request['username'].'#'.$request['number_of_last_tweets']);
        return $this->cache->remember($hashed_cache, env('CACHE_LIFETIME'), function () use ($request){
            return $this->repository->get_all_strings_to_shout($request);
        });
    }

}