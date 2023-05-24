<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Subcategory;
use Livewire\Component;

class DependetEditCategory extends Component
{

    public $categories;
    public $subcategories;
    public $childcategories;

    public $selectedcategory;
    public $selectedsubcategory;
    public $selectedchildcategory;
    
    public function mount($category, $subcategory, $childcategory)
    {
        $this->categories=Category::all();
        $this->selectedcategory=$category;
        $this->subcategories= Subcategory::where('category_id',$category)->get();
        $this->selectedsubcategory=$subcategory;
        $this->childcategories = ChildCategory::where('sub_category_id',$subcategory)->get();
        $this->selectedchildcategory=$childcategory;



    }
    public function updatedSelectedCategory($category)
    {
        if(!is_null($this->selectedcategory)) {
            $this->subcategories = Subcategory::where('category_id',$category)->get();
            $this->reset('selectedsubcategory','selectedchildcategory','childcategory');
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
        return view('livewire.dependet-edit-category');
    }
}
