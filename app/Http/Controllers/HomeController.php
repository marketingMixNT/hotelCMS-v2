<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Advantage;
use App\Models\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $advantages = Advantage::all();
        $apartmentsCategories = Category::whereJsonContains('type', 'apartamenty')->get();
        $posts = Post::published()->with('categories')->orderBy("published_at", "desc")->take(4)->get();
        $apartments = Apartment::take(4)->get();



        return view("pages.home.index", compact("posts", "advantages", 'apartmentsCategories','apartments'));
    }
}
