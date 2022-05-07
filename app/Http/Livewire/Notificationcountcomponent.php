<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notificationcountcomponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh',];
    public function render()
    {
        $userid = Auth::id();
        $notification = Notification::where('user_id',$userid)->where('read','no')->get();
        $notification = $notification->count();

        return view('livewire.notificationcountcomponent',compact('notification'));
    }
    public function makeNotificationRead()
    {
        $userid = Auth::id();
        Notification::where('user_id', $userid)
        ->update([
            'read' =>'yes'
         ]);
         $this->emit('refreshComponent');
    }
}
