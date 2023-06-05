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
        $data = PackageOrder::join('packages', 'package_orders.package_id', '=', 'packages.id')
            ->join('users', 'packages.user_id', '=', 'users.id')
            ->where('packages.user_id', auth()->id())
            ->select('package_orders.*')
            ->get();
        return view('livewire.package-order-component',compact('data'))->layout('layouts.master');
    }

    public function approvePAckage($id)
    {
        $pack =   PackageOrder::find($id);
        $pack->status = 1;
        $pack->save();
        return back();
    }

    public function rejectPAckage($id)
    {
        $pack =   PackageOrder::find($id);
        $pack->status = 2;
        $pack->save();
    }
}
