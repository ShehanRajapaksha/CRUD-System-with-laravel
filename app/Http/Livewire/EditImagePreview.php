<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditImagePreview extends Component
{
    use WithFileUploads;

    public $featuredImage;
    public $imageOne;
    public $imageTwo;
    public $imageThree;

    public $oldfeaturedImage;
    public $oldimageOne;
    public $oldimageTwo;
    public $oldimageThree;

    public function mount($oldfeaturedImage,$oldimageOne,$oldimageTwo,$oldimageThree)
    {
        $this->oldfeaturedImage=$oldfeaturedImage;
        $this->oldimageOne=$oldimageOne;
        $this->oldimageTwo=$oldimageTwo;
        $this->oldimageThree=$oldimageThree;


    }

    public function render()
    {
        return view('livewire.edit-image-preview');
    }
}
