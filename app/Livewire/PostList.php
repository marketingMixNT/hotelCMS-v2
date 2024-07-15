<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;

class PostList extends Component
{
    use WithPagination;

    #[Url]
    public $category = '';

    #[Computed]
    public function getPostsProperty()
    {
        return Post::published()
            ->with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })
            ->orderBy('published_at', 'desc')
            ->paginate(4);
    }

    #[Computed]
    public function getCategoriesProperty()
    {
        return Category::whereJsonContains('type', 'posty')->get();
    }

    #[Url]
    public function setCategory($slug)
    {
        $this->category = $slug;
        $this->resetPage();
        $this->emitSelf('refreshComponent');
        
    }

    public function render()
    {
        return view('livewire.post-list', [
            'posts' => $this->posts,
            'categories' => $this->categories
        ]);
    }
}
