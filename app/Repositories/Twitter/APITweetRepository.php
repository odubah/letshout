<?php

namespace App\Repositories\Twitter;

use Thujohn\Twitter\Facades\Twitter;

class APITweetRepository implements TweetRepository
{

    public function get_all_strings_to_shout(array $request)
    {

        try {
            $response = Twitter::getUserTimeline(
                ['screen_name' => $request['username'],
                    'count' => $request['number_of_last_tweets'], 'format' => 'array']
            );
            $string = $this->shout($response);

        } catch (\Exception $e) {
            return 'Error: '.Twitter::logs();
        }

        return $string;
    }

    /**
     * @param $response
     * @return array
     */
    private function shout($response)
    {
        $string = array_pluck($response, 'text');
        $string = array_map(function ($tweet) {
            return strtoupper($tweet) . '!';
        }, $string);
        return $string;
    }

}