<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        // ダミーデータ
        $articles = [];

        return view('articles.index', ['articles' => $articles]);
    }
}
