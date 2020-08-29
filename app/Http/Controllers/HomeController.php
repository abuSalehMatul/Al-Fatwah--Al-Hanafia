<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Question;
use App\Answer;

class HomeController extends Controller
{
    public function index()
    {
    	$latest_answered_question = Question::Locale()->LatestAnsweredQuestions()->take(3)->get();
        return view('frontend.home', compact('latest_answered_question'));
    }

    public function redirectToHome()
    {
		return redirect()->route('home');
    }
}
