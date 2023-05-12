<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function dashboard()
    {
        return view('articles.dashboard');
    }


}
