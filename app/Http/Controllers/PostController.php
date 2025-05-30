<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
            'summary' => 'nullable|max:500',
            'image_url' => 'nullable|url|max:255',
            'published_at' => 'nullable|date',
        ]);

        Post::create($request->all());

        $message = "L'article a été créé avec succès!";

        return redirect()->route('posts.index')->with('messsage', $message);
    }

    public function show(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post')); # compact('post') => ['post' => $post]
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
            'summary' => 'nullable|max:500',
            'image_url' => 'nullable|url|max:255',
            'published_at' => 'nullable|date',
        ]);

        $post = Post::findOrFail($id);

        $data = $request->only(
            'title',
            'content',
            'summary',
            'image_url',
            'published_at'
        );

        $post->update($data);

        $message = "L'article a été édité avec succès!";

        return redirect()->route('posts.index')->with('messsage', $message);
    }

    public function delete(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('messsage', 'Article supprimé !');
    }
}
