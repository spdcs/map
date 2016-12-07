<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Article;
use App\Http\Controllers\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function edit($id)
    {
        return view('admin.article.edit')->withArticle(Article::find($id));
    }

    public function store(Request $request)
    {
        //數據驗證
        $this->validate($request, [
            'title' => 'required|max:255', //必填、最大長度 255
            'body' => 'required', //必填
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->address = $request->get('address');
        $article->body = $request->get('body');
        $article->lat = $request->get('lat');
        $article->lng = $request->get('lng');
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('/');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失敗！');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('刪除成功！');
    }

    public function show($id)
    {
        return view('article/show')->withArticle(Article::with('hasManyComments')->find($id));
    }

    public function update(Request $request, $id)
    {
        //數據驗證
        $this->validate($request, [
            'title' => 'required|max:255', //必填、最大長度 255
            'body' => 'required', //必填
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->address = $request->get('address');
        $article->body = $request->get('body');
        $article->lat = $request->get('lat');
        $article->lng = $request->get('lng');


        if ($article->save()) {
            if(\Auth::user()->level == 0){
                return redirect('/');
            }
            return redirect('admin/article/');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失敗！');
        }
    }
}
