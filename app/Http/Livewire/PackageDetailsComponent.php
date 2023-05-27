<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Package;
use App\Models\User;
use Livewire\Component;

class PackageDetailsComponent extends Component
{
    public $slug;
    public $commentid;
    public $replayid;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $package = Package::where('slug',$this->slug)->first();
        $channelinfo = Channel::where('user_id',$package->user_id)->first();
        return view('livewire.package-details-component',compact('package','channelinfo'))->layout('layouts.master');
    }
}
