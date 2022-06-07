<?php

namespace App\Http\Livewire;

use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PackagePaymentComponent extends Component
{

    public $package_id;
    public $user_id;
    public $payment_type;
    public $amount;
    public $ref;
    public $account_no;
    public $from_date;
    public $day;
    public $ratting='';
    public $comment='';
    protected $rules = [
        'payment_type' => 'required',
        'account_no' => 'digits:11|required',
        'from_date' => 'required',
    ];
    public function mount($id)
    {
        $this->package_id = $id ;
        $this->user_id = Auth::user()->id ;
        $this->from_date = date('Y-m-d');

        $data = Package::where('id',$this->package_id)->first();
       $this->amount = $data->price-(($data->price*$data->discount)/100);
       $this->day = $data->day;


    }
    public function render()
    {
        $data = Package::where('id',$this->package_id)->first();
        return view('livewire.package-payment-component',compact('data'))->layout('layouts.master');
    }

    public function ChannelPayment()

    {
        $this->validate();

        PackageOrder::create([
            'package_id'=>$this->package_id,
            'user_id'=> Auth::user()->id,
            'payment_type' => $this->payment_type,
            'amount'=>$this->amount,
            'account_no' => $this->account_no,
            'ref' => $this->ref,
            'from_date'=>$this->from_date,
            'day'=>$this->day,

        ]);

            return redirect('/');





    }
}
