<?php

namespace App\Http\Livewire;

use App\Models\PackageOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RattingComponent extends Component
{
    public $ratting;
    public $comment;
    public $order_id;
    protected $rules = [
        'comment' => 'required|max:50',
        'ratting' => 'required',
    ];
    public function render()
    {
        return view('livewire.ratting-component')->layout('layouts.master');
    }
    public function mount($id)
    {
        $this->order_id = $id;
    }
    public function rattingConfirm()
    {
        $this->validate();

        PackageOrder::where('id', $this->order_id)
        ->update([
            'comment' => $this->comment,
            'ratting'=>$this->ratting,
            'status'=>1,

        ]);
        return redirect('packages',Auth::user()->id);

    }
}
