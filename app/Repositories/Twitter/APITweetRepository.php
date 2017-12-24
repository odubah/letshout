<?php

namespace App\Repositories\Twitter;

use Thujohn\Twitter\Facades\Twitter;

class APITweetRepository implements TweetRepository
{

    public function get_all_strings_to_shout(array $request)
    {

        try {
            // get account timeline base on user and last tweets
            $response = Twitter::getUserTimeline(
                ['screen_name' => $request['username'],
                    'count' => $request['number_of_last_tweets'], 'format' => 'array']
            );
            //Return message error if the account has not tweets
            if(count($response) == 0) {
                return ['This account has no Tweets to shout'];
            }
            //shout our tweet and add the ! mark
            $tweets = $this->shout($response);

        } catch (\Exception $e) {
            return Twitter::logs();
        }

        return $tweets;
    }

    /**
     * @param $response
     * @return array
     */
    private function shout($response)
    {
        //get the text array from the response
        $tweets = array_pluck($response, 'text');
        //SHOUT our tweets
        $tweets = array_map(function ($tweet) {
            return strtoupper($tweet) . '!';
        }, $tweets);
        return $tweets;
    }

}