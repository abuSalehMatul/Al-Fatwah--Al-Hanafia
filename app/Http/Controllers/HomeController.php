<?php

namespace App\Http\Controllers;

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
}
