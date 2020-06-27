<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use \App\Models\Post;
use \App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
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
    public function listar()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function criar()
    {
        $tags = Tag::all();
        return view('posts.create', [ 'tags' => $tags  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
            'publish' => 'required'
        ]);

        $request->image->storeAs('', $request->image->getClientOriginalName(), 'public');
        $caminhoArquivo =  $request->image->getClientOriginalName();

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' =>  $caminhoArquivo,
            'publish' => ($request->publish == "on") ? true : false,
            'published_at' => ($request->publish == "on" ) ? Carbon::now() : null
        ]);

        //dd( $post, $request);
        
        $post->tags()->attach( $request->tags );

        return redirect('posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        return view('posts.edit', ['post' => $post, 'tags' => $tags ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image',
            'publish' => 'required'
        ]);
        // dd( ($request->publish == "on") ? true : false );

        $request->image->storeAs('', $request->image->getClientOriginalName(), 'public');
        $caminhoArquivo =  $request->image->getClientOriginalName();
        
        Post::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' =>  $caminhoArquivo,
            'publish' => ($request->publish == "on") ? true : false,
            'published_at' => ($request->publish == "on" ) ? Carbon::now() : null
        ]);

        $post = Post::find($id);
        $post->tags()->sync($request->tags);
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletar($id)
    {
        $post = Post::find($id);
        $post->tags()->delete();
        $post->delete();
        
        return redirect('posts');
    }
}
