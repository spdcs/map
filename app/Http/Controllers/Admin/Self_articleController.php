<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;

class Self_articleController extends Controller
{
    public function show()
    {
        $id = Auth::user()->id;
        $selfarticle = Article::find($id);
        //dd($selfarticle);
        return view('admin/member',['user'=>$selfarticle]);
    }
}
