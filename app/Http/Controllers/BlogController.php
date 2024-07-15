<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index()
    {
        return view("pages.blog.index");
    }

    // public function category($slug)
    // {

    //     $posts=Post::where("slug","=", $slug)->get();

    //     return view("pages.blog.index", compact("post"));
    // }

    public function show(Post $post): View
    {

        $posts = Post::published()->orderByDesc('published_at')->take(4)->get();


        $filteredPosts = $posts->filter(function ($p) use ($post) {
            return $p->id !== $post->id;
        });


        $latestPosts = $filteredPosts->take(3);


        return view("pages.blog.show", compact("post", 'latestPosts'));
    }
}
