<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $arr['categories'] = Category::find($user_id);
        $arr['user'] = User::find($user_id);
        return view('inc.profile')->with($arr);
    }

}
