<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Article;
use App\Book;
use App\Category;
use App\Question;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $data = [
            'total_answered' => Answer::where('status', 'active')->count(),
            'total_question' => Question::count(),
            'total_category' => Category::count(),
            'total_user' => User::count(),
            'publish_article' => Article::where('status', 'active')->count(),
            'total_book' => Book::count()
        ];
        return view('backend.home')->with('data', $data);
    }
}
