<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;

class SelfArticleController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $user = User::find(Auth::id());
        $articles = $user->hasManyArticle()->get();
        //dd($articles);
        return view('admin.article.selfarticle',['user'=>$articles]);
//        return $this->hasMany('App\Article', 'user_id');
//        $id = Auth::user()->id;
//        $selfarticle = Article::find($id);
//        //dd($selfarticle);
//        return view('auth/selfarticle',['user'=>$selfarticle]);
    }
}
