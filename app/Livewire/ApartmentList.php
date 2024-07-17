<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Apartment;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ApartmentList extends Component
{


    use WithPagination;

    #[Url]
    public $category = '';

    #[Computed]
    public function getApartmentsProperty()
    {
        return Apartment::with('categories')
            ->when($this->category, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('slug', $this->category);
                });
            })
            ->paginate(4);
    }

    #[Computed]
    public function getCategoriesProperty()
    {
        return Category::whereJsonContains('type', 'apartamenty')->get();
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
        return view('livewire.apartment-list',[
            'apartments' => $this->apartments,
            'categories' => $this->categories
        ]);
    }
}
