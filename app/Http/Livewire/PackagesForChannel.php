<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Package;
use Livewire\Component;

class PackagesForChannel extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $user =  Channel::where('slug',$this->slug)->first();
        $data = Package::where('user_id',$user->user_id)->get();
        return view('livewire.packages-for-channel',compact('data'))->layout('layouts.master');
    }
}
