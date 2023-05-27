<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RemovePostImage extends Component
{
    public $image;
    public function render()
    {
        return view('livewire.remove-post-image');
    }
    public function removeOld($image)
    {
        dd("true");
//        $key = array_search($image, $this->images);
//        if ($key !== false) {
//            unset($this->images[$key]);
//        }
//        dd($this->images);
//        return back();
    }
}
