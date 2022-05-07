<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Channellike;
use App\Models\User;
use Livewire\Component;

class FollowingComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh',];
    public function render()
    {




        $following = Channellike::where('user_id',auth()->user()->id)->where('like','yes')->get();
        $this->emit('refreshComponent');
        return view('livewire.following-component',compact('following'));
    }
}
