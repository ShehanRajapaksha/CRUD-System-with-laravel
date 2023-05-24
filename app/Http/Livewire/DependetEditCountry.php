<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class DependetEditCountry extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $selectedcountry=null;
    public $selectedstate=null;
    public $selectedcity=null;
    
    
    public function mount($country,$state,$city)
    {
        $this->countries=Country::all();
        $this->selectedcountry=$country;
        $this->selectedstate=$state;
        $this->selectedcity=$city;
        $this->states= State::where('country_id',$country)->get();
        $this->cities = City::where('state_id',$state)->get();

    }
    public function updatedSelectedCountry($country)
    {
        if(!is_null($this->selectedcountry)) {
            $this->states  = State::where('country_id',$country)->get();

        }
        $this->reset(['selectedstate','selectedcity','cities']);
    }

    public function updatedSelectedState($state)
    {
        if(!is_null($this->selectedstate)) {
            $this->cities = City::where('state_id',$state)->get();
        }

    }
    public function render()
    {
        return view('livewire.dependet-edit-country');
    }
}
