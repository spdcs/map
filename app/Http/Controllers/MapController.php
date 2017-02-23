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

//            \Config::set('googlmapper.markers["icon"]', 'https://scotch.io/wp-content/uploads/2016/07/4XOxGYvdTGGEVwcRIof6_how-to-use-laravel-config-files.png');
           // dd(config('googlmapper.markers["icon"]'));
            $content = "標題：".$article->title."<br>內容：".$article->body."<br>地址：".$article->address;
//          \Mapper::marker($article->lat, $article->lng, ['draggable' => true,'symbol' => 'circle', 'scale' => 1000,'icon'=>'dad']);
          \Mapper::informationWindow($article->lat, $article->lng, $content);

        });

        return view('map');

    }

}


