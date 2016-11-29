<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Article;

class MapController extends Controller
{
    public function show()
    {
        //return view('map')->withArticles(\App\Article::all());
        $articles = DB::table('articles')->get();
        return view('map',['article' => $articles]);
    }

    public function index(){
        // Draw a map
        \Mapper::map(23.795201261829853, 120.9694504737854, ['marker' => false]);

        // Add information window for each address
        $collection = Article::all();

        $collection->each(function($article)
        {
            $content = "標題:".$article->title."<br>內容:".$article->body."<br>地址:".$article->address;

            \Mapper::informationWindow($article->lat, $article->lng, $content);
        });

        return view('map');

    }

}


