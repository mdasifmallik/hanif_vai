<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return view('post', [
            'categories' => Category::all(),
            'posts' => Post::with('category')->get(),
            // 'posts' => $this->post->with('category')->get(),
            // 'posts' => Category::findOrFail(1)->posts
        ]);
    }

    public function createPost(Request $request)
    {
        Post::create($request->except('_token'));
        return back();
    }
}
