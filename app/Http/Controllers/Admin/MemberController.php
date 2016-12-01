<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class MemberController extends Controller
{
    public function update()
    {

        $input = \Input::all();
        $id = $input['id'];
        $level = $input['level'];

        $user = User::find($id);
        $user->level = $level;
        $user->save();
        $allUser = User::all();

        return view('admin/member',['user'=>$allUser]);
    }
    public function show()
    {
        $allUser = User::all();
        //dd($alluser);
        return view('admin/member',['user'=>$allUser]);
    }
}
