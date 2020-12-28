<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $post = Posts::paginate(10);
        return view('pages.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tags::all();
        $category = Category::all();
        return view('pages.post.create', compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);

        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'gambar' => 'public/upoads/posts/'.$new_gambar,
            'slug' => Str::slug($request->judul)
        ]);
        $post->tags()->attach($request->tags);

        $gambar->move('public/upoads/posts/', $new_gambar);
        return redirect()->back()->with('success', 'Post berhasil ditambahkan');

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
        $category = Category::all();
        $tags = Tags::all();
        $post = Posts::findOrFail($id);
        return view('pages.post.edit', compact('post', 'tags', 'category'));
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
        $request ->validate([
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);

       
        $post = Posts::findOrFail($id);

        if($request->has('gambar')){
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('public/upoads/posts/', $new_gambar);
             
             $post_data = [
                 'judul' => $request->judul,
                 'category_id' => $request->category_id,
                 'content' => $request->content,
                 'gambar' => 'public/upoads/posts/'.$new_gambar,
                 'slug' => Str::slug($request->judul)
             ];
        } else{
             $post_data = [
                 'judul' => $request->judul,
                 'category_id' => $request->category_id,
                 'content' => $request->content,
                 'slug' => Str::slug($request->judul)
             ];
        }


        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return redirect()->route('post.index')->with('success', 'Post berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post telah berhasil dihapus(Silahkan cek trashed post)');
    }

    public function tampil_hapus(){

       
        $post = Posts::onlyTrashed()->paginate(10);
        return view('pages.post.hapus', compact('post'))->with('success', 'Yakin Post ini yang di hapus cek restore');
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post berhasil di Restore (Silahkan cek list post)');
    }

    public function kill($id){
        $post = Posts::withTrashed()->where('id',$id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Post berhasil dhapus secara permanen');
    }
}
