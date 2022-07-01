<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Request

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user-list', ['users' => $users]);
    }

    public function add()
    {
        return view('user');
    }

    public function store(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->family = $request->family;
        $user->password = $request->password;
        $user->access = $request->access;
        $user->save();
        return redirect('/user/list')->withErrors(['success' => 'با موفقیت ثبت شد .']);
    }
}
