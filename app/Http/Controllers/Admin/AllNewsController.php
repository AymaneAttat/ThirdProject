<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\News;

class AllNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $arr['news'] = News::orderBy('id','desc')->paginate(3);
        return view('inc.listnews')->with($arr);
    }

    public function show($id)
    {
        $news = News::find($id);
        return view('inc.showlistnews')->with('news', $news);
    }
}
