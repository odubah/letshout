<?php

namespace App\Repositories\Twitter;

interface TweetRepository
{
    public function get_all_strings_to_shout(array $request);
}