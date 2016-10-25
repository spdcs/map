<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class MemberController extends Controller
{
    public function save()
    {
        $editLevel = level::all();
        return view('admin/member',['user'=>$editLevel]);
    }
    public function show()
    {
        $allUser = User::all();
        //dd($alluser);
        return view('admin/member',['user'=>$allUser]);
    }
}
