<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use Livewire\Component;

class DependedCategory extends Component
{

    public $categories;
    public $subcategories;
    public $childcategories;

    public $selectedcategory=null;
    public $selectedsubcategory=null;
    
    public function mount()
    {
        $this->categories=Category::all();

    }
    public function updatedSelectedCategory($category)
    {
        if(!is_null($this->selectedcategory)) {
            $this->subcategories = Subcategory::where('category_id',$category)->get();
        }

    }

    public function updatedSelectedSubCategory($category)
    {
        if(!is_null($this->selectedsubcategory)) {
            $this->childcategories = ChildCategory::where('sub_category_id',$category)->get();
        }

    }

    public function render()
    {
        return view('livewire.depended-category');
    }
}
