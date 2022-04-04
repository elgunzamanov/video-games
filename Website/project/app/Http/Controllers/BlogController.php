<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    public function getBlog() {
        $posts = Blog::orderBy('id', 'desc')->where('status', '1')->get();
        View::share('posts', $posts);
        return view('blog.blog');
    }

    public function getPost($slug) {
        $post = Blog::where('slug', $slug)->first();
        View::share('post', $post);
        return view('blog.post');
    }
}
