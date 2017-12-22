<?php

namespace App\Http\Controllers;

use App\Repositories\Twitter\TweetRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoutController extends Controller
{
    private $repository;

    public function __construct(TweetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show(Request $request)
    {

        $custom_validation_message = [
            'number_of_last_tweets.between' =>
                'Hi ' . $request->ip() . '! The :attribute must be between :min - :max. You can read more about it here - https://developer.twitter.com/en/docs/tweets/timelines/api-reference/get-statuses-user_timeline.html',
            'number_of_last_tweets.integer' => 'The :attribute value :input is not an integer.'
        ];

        //Validate Request
        $validation = Validator::make($request->all(),[
            'username' => 'required',
            'number_of_last_tweets' => 'required|integer|between:1,200',
        ],$custom_validation_message);

        if($validation->fails()){
            return $validation->errors();
        }

        return $this->repository->get_all_strings_to_shout($request->all());
    }
}
