<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Media;

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

  public function getAllMediaView($lang)
  {
    $medias = $this->getMediaActives($lang);
    return view('frontend.all_media')->with('medias', $medias);
  }

  public function getMediaActives($lang)
  {
    return Media::orderBy('created_at', 'DESC')
      ->where('language', $lang)
      ->where('status', 'active')->paginate(20);
  }

  public function getProfile($lang, $id)
  {
     if(auth()->id() == $id){
        $questions = auth()->user()->questions;
        return view('frontend.profile')->with('questions', $questions);
     }
     return redirect()->back();
  }

  public function aboutUs($lang)
  {
     $aboutUs = config('aboutUs.'.$lang);
     return view('frontend.about_us')->with('aboutUs', $aboutUs);
  }
}
