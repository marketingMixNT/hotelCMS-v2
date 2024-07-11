<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class PostList extends Component
{
    use WithPagination;

    #[Url()]
    public $category = '';
  

    #[Computed()]
    public function posts()
    {
        return Post::published()
            ->with('categories')
            ->when($this->category, function ($query) {
                $query->withCategory($this->category);
            })
            ->orderBy('published_at', 'desc')
            ->paginate(4);
    }


    #[Computed()]
    public function categories()
    {
        return Category::whereJsonContains('type', 'posty')->get();
    }

    #[Url()]
    public function setCategory($slug)
    {
        $this->category = $slug;
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}