<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index() {
        $games = Games::all();
        $posts = Blog::orderBy('id', 'desc')->where('status', '1')->limit(3)->get();
        View::share('games', $games);
        View::share('posts', $posts);
        return view('index');
    }
}
