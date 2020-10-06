<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Question;
use App\Answer;

class HomeController extends Controller
{
  public function index()
  {
  	$latest_answered_question = Question::Locale()->LatestAnsweredQuestions()->take(3)->get();
  	$selected_questions = Question::Locale()->Selected()->take(3)->get();
    return view('frontend.home', compact('latest_answered_question', 'selected_questions'));
  }

  public function redirectToHome()
  {
	  return redirect()->route('home');
  }

  public function questionView($id)
  {
  	$question = Question::Locale()->findOrFail($id);
  	// request()->route()->setParameter('locale', request()->route()->originalParameters()['locale']);
  	// return request()->route()->parameters();
    return view('frontend.questions.view', compact('question'));
  }

  public function verifyUser($token)
  {
    $match = User::where('token', $token)->first();
    if ($match) {
      $match->token = "";
      $match->save();
      return redirect('/');
    }
    return "wrong token";
  }
}
