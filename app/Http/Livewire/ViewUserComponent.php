<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewUserComponent extends Component
{
    public $userId;
    public function render()
    {
        $data = User::find($this->userId);

        return view('livewire.view-user-component',compact('data'))->layout('layouts.master');
    }

    public function mount($id)
    {
        $this->userId = $id;
    }
}
