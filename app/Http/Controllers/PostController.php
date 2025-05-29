<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
         $post = new Post();
         
    }

    public function show(int $id)
    {
        $post = Post::find($id);

        return view('posts.show', ['post' => $post]);
    }
}