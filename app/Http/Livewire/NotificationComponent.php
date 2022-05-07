<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh',];
    public function render()
    {
        $userid = Auth::id();
        $notification = Notification::where('user_id',$userid)->latest()->get();

        $notificationcount = Notification::where('user_id',$userid)->where('read','no')->get();
        $notificationcount = $notificationcount->count();
        //$this->emit('refreshComponent');
        return view('livewire.notification-component',compact('notification','notificationcount'));
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
