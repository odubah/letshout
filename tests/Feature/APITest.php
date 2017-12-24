<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class APITest extends TestCase
{

    public function test_api_required_fields()
    {
        $this->json('GET', 'api/shout')
            ->assertStatus(200)
            ->assertJson([
                'username' => ['The username field is required.'],
                'number_of_last_tweets' => ['The number of last tweets field is required.'],
            ]);
    }

    public function test_api_number_of_last_tweets_must_be_an_integer()
    {
        $response = $this->json('get', 'api/shout', ['username' => 'odubah', 'number_of_last_tweets' => '1r']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'number_of_last_tweets' => ['The number of last tweets value 1r is not an integer.'],
            ]);
    }

    public function test_api_number_of_last_tweets_must_be_between_1_and_200()
    {
        $response = $this->json('get', 'api/shout', ['username' => 'odubah', 'number_of_last_tweets' => '1000']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'number_of_last_tweets' => ['The number of last tweets must be between 1 - 200. You can read more about it here - https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline.html'],
            ]);
    }

    public function test_api_call_has_no_tweets()
    {
        $response = $this->json('get', 'api/shout', ['username' => 'AryanRaj9860', 'number_of_last_tweets' => '10']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'This account has no Tweets to shout',
            ]);
    }
}
