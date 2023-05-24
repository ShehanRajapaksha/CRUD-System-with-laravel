<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class DependetCountry extends Component
{  public $countries;
    public $states;
    public $cities;

    public $selectedcountry=null;
    public $selectedstate=null;
    
    public function mount()
    {
        $this->countries=Country::all();

    }
    public function updatedSelectedCountry($country)
    {
        if(!is_null($this->selectedcountry)) {
            $this->states  = State::where('country_id',$country)->get();
        }

    }

    public function updatedSelectedState($state)
    {
        if(!is_null($this->selectedstate)) {
            $this->cities = City::where('state_id',$state)->get();
        }

    }

  public function render()
    {
        return view('livewire.dependet-country');
    }
}
