<?php

namespace App\Http\Livewire;

use App\Models\PackageOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPackageOrderComponent extends Component
{
    public function render()
    {
        $data = PackageOrder::where('user_id',Auth::user()->id)->get();
        return view('livewire.my-package-order-component',compact('data'))->layout('layouts.master');
    }

}
