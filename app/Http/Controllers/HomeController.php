<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $advantages = Advantage::all();
        $posts = Post::published()->with('categories')->orderBy("published_at", "desc")->take(4)->get();


        return view("pages.home.index", compact("posts", "advantages"));
    }
}
