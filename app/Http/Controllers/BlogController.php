<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
        $category_widget = Category::all();
        $tag = Tags::all();
       $data = $posts->latest()->take(8)->get();

       return view('blog', compact('data', 'category_widget', 'tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function isi_blog($slug)
    {
        $category_widget = Category::all();
        $tag = Tags::all();
        $data = Posts::where('slug', $slug)->get();
        return view('blog1.isi', compact('data', 'tag', 'category_widget'));
    }

    public function list_blog()
    {
        $category_widget = Category::all();
        $tag = Tags::all();
        $data = Posts::latest()->paginate(6);
        return view('blog1.list', compact('data', 'tag', 'category_widget'));
    }

    public function list_category(category $category){
        $category_widget = Category::all();
         $tag = Tags::all();

        $data = $category->posts()->paginate(6);
        return view('blog1.list', compact('data', 'tag', 'category_widget'));
    
    }
    public function cari(request $request){
         $category_widget = Category::all();
         $tag = Tags::all();

        $data = Posts::where('judul', $request->cari)->orwhere('judul','like','%'.$request->cari.'%')->paginate(6);
        return view('blog1.list', compact('data', 'tag', 'category_widget'));
    }
}
