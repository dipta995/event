<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class RemovePackageImage extends Component
{
    public $image;
    public function render()
    {
        return view('livewire.remove-package-image');
    }
}
