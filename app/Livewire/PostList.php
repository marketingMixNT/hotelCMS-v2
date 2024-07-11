<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;


class PostList extends Component
{

    use WithPagination;
   
    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->with('categories')
            ->orderBy('published_at', 'desc')
            ->paginate(4);
    }

    public function render()
    {
        return view('livewire.post-list');
    }

    #[Computed()]
    public function categories(){
        return Category::whereJsonContains('type', 'posty')->get();
    }
}
