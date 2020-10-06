<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Question;

class CategoryController extends Controller
{
    public function getAll()
    {
        $locale = Session::get('APP_LOCALE');
        return DB::table('categories')
        ->select("name_".$locale.' as name', 'parent_id', 'id')
        ->get();
    }

    public function getQuestionByCategory($categoryId)
    {
        return Question::getByCategory($categoryId);
    }

    public function showByCategory($categoryId)
    {
        $questions = Question::getByCategory($categoryId);
        return view('frontend.category')->with('questions', $questions);
    }
}
