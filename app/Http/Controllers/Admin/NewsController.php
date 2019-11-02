<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->paginate(3);
        return view('news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalname();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public/news', $fileNameToStore);
        }else{
            $fileNameToStore = '' ;
        }
        
        $news = new News;
        $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->description = $request->input('description');
        $news->author = $request->input('author');
        $news->user_id = auth()->user()->id;
        $news->photo = $fileNameToStore;
        $news->save();
        return redirect()->route('News.index')->with('success','News Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr['news'] = News::find($id);
        $arr['categories'] = Category::all();
        return view('news.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'photo' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('photo')){
            $filenameWithExt = $request->file('photo')->getClientOriginalname();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('photo')->storeAs('public/news', $fileNameToStore);
        }
        
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->category_id = $request->input('category_id');
        $news->description = $request->input('description');
        $news->author = $request->input('author');
        if($request->hasFile('photo')){
            $news->photo = $fileNameToStore;
        }
        $news->save();
        return redirect()->route('News.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if( $news->photo ){
            Storage::delete('public/news/'.$news->photo);
        }
        $news->delete();
        return redirect()->route('News.index');
    }
}
