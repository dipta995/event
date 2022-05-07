<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Channellike;
use Livewire\Component;

class FollowerComponent extends Component
{
    public function render()
    {
        $chennel = Channel::where('user_id',auth()->user()->id)->first();
        $followers = Channellike::where('channel_id',$chennel->id)->where('like','yes')->get();
        $this->emit('refreshComponent');
        return view('livewire.follower-component',compact('followers'));
    }
}
