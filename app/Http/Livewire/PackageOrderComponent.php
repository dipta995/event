<?php

namespace App\Http\Livewire;

use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PackageOrderComponent extends Component
{
    public function render()
    {
        Package::where('user_id',Auth::user()->id)->get();
        $data = PackageOrder::leftJoin('packages','packages.id','package_orders.package_id')->where('packages.user_id',Auth::user()->id)->get();
        return view('livewire.package-order-component',compact('data'))->layout('layouts.master');
    }
}
