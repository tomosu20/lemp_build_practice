<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('post.index', ['posts' => Post::all()]);
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function create()
    {
        return view('post.create', compact('post'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return view('post.index', ['posts' => Post::all()]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return view('post.show', ['post' => $post]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return view('post.index', ['posts' => Post::all()]);
    }
}
