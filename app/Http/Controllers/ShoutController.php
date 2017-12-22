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
        //Validate Request
        $validation = Validator::make($request->all(),[
            'username' => 'required',
            'number_of_last_tweets' => 'required|integer|min:1',
        ]);

        if($validation->fails()){
            return $validation->errors()->toJson();
        }

        return $this->repository->get_all_strings_to_shout($request->all());
    }
}
