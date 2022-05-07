<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Livewire\Component;

class Dropdowns extends Component
{
    // public $division;
    // public $districts=[];
    // public $district;

    // public function render()
    // {

    //      return view('livewire.dropdowns')->layout('layouts.master')->withDivisions(Division::orderBy('name')->get());
    // }
    public $divisions;
    public $districts;
    public $district;

    public $selectedDivision = NULL;

    public function mount()
    {
        $this->divisions = Division::all();
        $this->districts = collect();
    }

    public function render()
    {


        return view('livewire.dropdowns')->layout('layouts.master');
    }

    public function updatedSelectedDivision($division)
    {
        if (!is_null($division)) {
            $this->districts = District::where('division_id', $division)->get();
        }
    }
}
