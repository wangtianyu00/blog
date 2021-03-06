<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\StoreArticle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('/admin/article', compact('articles'));
    }

    public function create()
    {
        if (Input::get('action') == 'update') {
            // 
            $categories = Category::all();
            $article = Article::with('category')
                ->where('id', '=', Input::get('id'))->first();
            return view('/admin/article_new', compact(['categories' => 'categories', 'article' => 'article']));
            // return view("404")->with('content', Input::get('id'));
        } else {
            $categories = Category::all();
            return view('/admin/article_new', compact('categories'));
        }
    }
    public function new_article(StoreArticle $request)
    {
        $article = new Article;
        $article->title       = request('title');
        $article->slug        = '/article/'.request('slug');
        $article->category_id = request('category_id');
        $article->content     = request('editormd-html-code');
        $article->markdown    = request('markdown');
        $article->save();
        return redirect()->to('admin/article');
    }

    public function del_article()
    {
        Article::where('id', '=', request('id'))->delete();
        return redirect()->to('admin/article');
    }

    public function update_category()
    {
        // DB::table('articles')->insert([
        //     'name' => request('name'),
        //     'father' => request('father'),
        //     'path' => '/category/'. request('name'),
        //     'type' => 'column'
        // ]);
        return redirect()->to('admin/category');
    }
}
