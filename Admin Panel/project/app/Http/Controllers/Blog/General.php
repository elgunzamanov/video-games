<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class General extends Controller
{
    public function getAllPosts() {
        $posts = Blog::all();
        $activePosts = Blog::where('status', '1')->get();
        View::share('posts', $posts);
        View::share('activePosts', $activePosts);
        return view('blog.list');
    }

    public function newPost() {
        return view('blog.new_post');
    }

    public function addPost(Request $request) {
        $request->validate([
            'add_title' => 'required | min:3 | max:255',
            'add_excerpt' => 'required | min:3 | max:255',
            'add_featured_image' => 'required | image | mimes:jpg,jpeg,png | max:2048',
            'add_body' => 'required',
        ]);

        $post = new Blog;
        $post->title = $request->add_title;
        $post->excerpt = $request->add_excerpt;
        $post->author = Auth::user()->name;
        $post->body = $request->add_body;
        $post->slug = Str::slug($request->add_title);
        $post->status = $request->post_add_active ? '1' : '0';
        $post->published_at = Carbon::now();

        if ($request->hasFile('add_featured_image')) {
            $image = $request->file('add_featured_image');
            $name = Str::slug($request->add_title).'-'.rand(1000, 9999).'.'.$image->getClientOriginalExtension();
            $directory = 'assets/media/blog/';
            $image->move($directory, $name);
            $image_path = $directory.$name;
            $post->image = $image_path;
        }

        $post->save();
        return redirect()->back()->with($post ? 'success' : 'error', true);
    }

    public function getPost($id) {
        $post = Blog::find($id);
        if ($post) {
            return view('blog.edit_post', compact('post'));
        }
        return 0;
    }

    public function editPost(Request $request) {
        $request->validate([
            'edit_title' => 'required | min:3 | max:255',
            'edit_excerpt' => 'required | min:3 | max:255',
            'edit_featured_image' => 'nullable | image | mimes:jpg,jpeg,png | max:2048',
            'edit_body' => 'required',
        ]);

        $post = Blog::find($request->edit_id);
        $post->title = $request->edit_title;
        $post->excerpt = $request->edit_excerpt;
        $post->body = $request->edit_body;
        $post->status = $request->post_edit_active ? '1' : '0';
        $post->published_at = $request->edit_publish_date;

        if ($request->hasFile('edit_featured_image')) {
            $image = $request->file('edit_featured_image');
            $name = Str::slug($request->edit_title).'-'.rand(1000, 9999).'.'.$image->getClientOriginalExtension();
            $oldImage = $post->image;
            $directory = 'assets/media/blog/';
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $image->move($directory, $name);
            $name = $directory.$name;
            $post->image = $name;
        }

        return redirect()->back()->with($post->save() ? 'success' : 'error', true);
    }

    public function viewPost($slug) {
        $post = Blog::where('slug', $slug)->first();
        if ($post) {
            return view('blog.view_post', compact('post'));
        }
        return 0;
    }
}
