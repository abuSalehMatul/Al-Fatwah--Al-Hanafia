<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    return view('frontend.home');
  }

  public function redirectToHome()
  {
    return redirect()->route('home', ['locale' => config('app.locale')]);
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
