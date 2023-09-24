<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Routing\Controller;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
    
        return view('forum.forum', compact('posts'));
    }
    public function create()
    {
        return view('forum.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $user = auth()->user();
    
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_account_id = auth()->user()->userAccount->id;
        $post->save();
    
        return redirect()->route('forum.index');
    }
    
    public function show(Post $post)
    {
        $post->load('account');
        
        return view('forum.show', compact('post'));
    }
    
    public function edit(Post $post)
    {
        return view('forum.edit', compact('post'));
    }
    
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
    
        return redirect()->route('forum.show', $post);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('forum.index');
    }
    
}