<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
