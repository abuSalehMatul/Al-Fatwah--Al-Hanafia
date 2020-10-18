<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Question;
use App\Category;

class CategoryController extends Controller
{
    public function getAll()
    {
        $locale = Session::get('APP_LOCALE');
        return DB::table('categories')
        ->whereNull('parent_id')
        ->select("name_".$locale.' as name', 'parent_id', 'id')
        ->get();
    }

    public function getQuestionByCategory($categoryId)
    {
        return Question::getByCategory($categoryId);
    }

    public function showByCategory($lang, $categoryId)
    {
        $questions = Question::getByCategory($categoryId);
        $subs =  Category::where('parent_id', $categoryId)->get();
        return view('frontend.category')->with('questions', $questions)->with('childs', $subs);
    }
}
