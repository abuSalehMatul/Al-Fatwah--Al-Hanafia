<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function getAll()
    {
        $articles = Article::orderBy('created_at', 'DESC')->paginate(15);
        return view('backend.all_article')->with('articles', $articles);
    }

    public function changeStatus($id, $status)
    {
        if($status == null) return 0;
        $article = Article::findOrFail($id);
        $article->status = $status;
        return $article->save();   
    }

    public function find($id)
    {
        $articles = Article::findOrFail($id);
        return view('backend.article_edit')->with('articles', $articles);
    }
}
