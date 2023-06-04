<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use Livewire\Component;

class ChannelUpdateComponent extends Component
{
    public $name;
    public $phone ;
    public $address;
    public $channelId;
    public function mount(){
       $channelID = Channel::where('user_id',auth()->id())->first();
        $this->channelId = $channelID->id;
        $this->name = $channelID->name;
        $this->address = $channelID->address;
        $this->phone = $channelID->phone;
    }
    public function render()
    {
        return view('livewire.channel-update-component');
    }

    public function updateChannelInformation()
    {
        $row = Channel::find($this->channelId);
        $row->name = $this->name;
        $row->phone = $this->phone;
        $row->address = $this->address;
        $row->save();
    }
}
