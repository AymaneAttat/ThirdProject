<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arr['users'] = User::all();
        return view('inc.list')->with($arr);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('inc.showlist')->with('user', $user);
    }
}
