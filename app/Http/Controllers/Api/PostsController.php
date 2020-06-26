<?php

namespace App\Http\Controllers\Api;

use \App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $posts = Post::all();

        return $posts;
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response in json format.
     */
    public function apenas($id)
    {
        $post = Post::find($id);

        $post->tags = $post->tags()->pluck('name');

        return response()->json($post);
    }
}
