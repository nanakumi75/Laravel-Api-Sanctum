<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function fetch(){
        $results = Http::get('https://quizapi.io/api/v1/questions',[
        'apiKey' => 'xCoWJScmenhe9DOOqbMpROhMTb9Bh9eo4DkUUbn9',
        'limit' => 20
        ]);

        $questions = json_decode($results->body());
        return view('welcome',compact('questions'));
    }
}
