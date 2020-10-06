<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Category;

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

    public function createForm()
    {
        $categories = Category::get();
        $langs = config('app_langs');
        return view('backend.articleCreate')->with('categories', $categories)->with('langs', $langs);
    }

    public function find($id)
    {
        $article = Article::findOrFail($id);
        return view('backend.article_edit')->with('article', $article);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'article_id' => 'required|integer'
        ]);
        $article = Article::findOrFail($request->article_id);
        $article->title = $request->title;
        $article->body = $request->body;
        $article->status = 'pending';
        $article->updated_by = auth()->id();
        $article->save();
        return redirect()->back();
    }

    public function save(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'lang' => 'required',
            'body' => 'required',
            'title' => 'required'
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->category_id = $request->category;
        $article->body = $request->body;
        $article->created_by = auth()->id();
        $article->language = $request->lang;
        $article->slug = rand(0,1233);
        $article->status = 'pending';
        $article->save();
        return redirect()->route('admin.article.find', $article->id);
    }
}
