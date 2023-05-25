<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Comment;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\ArticleTag;


class ArticleController extends Controller
{

    public function dashboard()
    {

        // Get all of the articles associated with the current user.
        $std = Article::all();

        // Return the view, passing in the articles array.
        //eager loading in laravel (with)
        return view('articles.dashboard')->with(['articles' => $std]);
    }
    public function updatearticle($articleId)
    {
        $article = Article::find($articleId);
        if (!$article) {
            // Handle the case when the article is not found
            abort(404);
        }
        $tags = $article->tags;
        return view('articles.update')->with(['article' => $article, 'tags' => $tags]);
    }



    public function updatedArticle(Request $request, $articleId)
    {
        $std = Article::find($articleId);
        $std->title = $request->input('title');
        $std->image = $request->input('image');
        $std->content = $request->input('content');
        $std->category_id = $request->input('category_id');
        $std->user_id = $request->input('user_id');

        $std->save();

        return redirect()->route('dashboard');
    }

    public function createArticle(Request $request)
    {
        $article = new Article();
        $article->title = $request->get('title');
        $article->image = $request->get('image');
        $article->content = $request->get('content');
        $article->category_id = $request->get('category_id');
        $article->user_id = $request->get('user_id');
        $article->save();



        foreach ($request->get('tags') as $tagName) {
            // Check if a tag with the given name already exists
            $tag = Tag::where('name', $tagName)->first();

            // If the tag does not exist, create a new one
            if (!$tag) {
                $tag = new Tag();
                $tag->name = $tagName;
                $tag->save();
            }

            // Create and save a new ArticleTag object
            $articletag = new ArticleTag();
            $articletag->article_id = $article->id;
            $articletag->tag_id = $tag->id;
            $articletag->save();
        }

        return redirect()->route('dashboard');
    }




    public function loadCreatepage()
    {
        $category = Category::all();
        $userid = User::all();
        return view('articles.createpage')->with(['category' => $category, 'user' => $userid],);
    }


    public function mainpage()
    {
        return view("dashboard");
    }

    public function articleRead($articleId)
    {
        $article = Article::find($articleId);

        if (!$article) {
            abort(404);
        }

        $comments = Comment::where('article_id', $articleId)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('articles.read')->with(['article' => $article, 'comments' => $comments]);
    }

    public function delete($id)
    {
        $article = Article::destroy($id);

        return redirect()->route('dashboard');
    }
}