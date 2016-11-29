<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class MemberController extends Controller
{
    public function update($id)
    {
        $user = User::find($id);
        $input = Input::all();
        $user = new User();
        $user->level = $input['level'];
        $user->save();
        return view('admin/member');
    }
    public function show()
    {
        $allUser = User::all();
        //dd($alluser);
        return view('admin/member',['user'=>$allUser]);
    }
}
