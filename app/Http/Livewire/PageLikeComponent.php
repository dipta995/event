<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PageLikeComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh',];
    public function render()
    {
        $sId = Auth::id();
        $mychannel = Channel::where('user_id', '=',$sId)->first();
        // $this->emit('refreshComponent');
        //$this->emitTo('page-like-component','refreshComponent');
        return view('livewire.page-like-component',compact('mychannel'));
    }

}
