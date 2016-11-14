<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MapController extends Controller
{
    public function show()
    {
        return view('map')->withArticles(\App\Article::all());
    }
    
}


