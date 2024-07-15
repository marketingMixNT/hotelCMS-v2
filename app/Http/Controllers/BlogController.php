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
        return view("pages.blog.show", compact("post"));
    }
}
