<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\ChannelPayment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChannelPaymentComponent extends Component
{
    public $channel_id;
    public $payment_type;
    public $amount;
    public $account_no;
    public $ref;
    public $from_date;
    public $to_date;
    protected $rules = [
        'payment_type' => 'required',
        'account_no' => 'digits:11|required',
        'ref' => 'required',
    ];
    public function mount()
    {
        $this->channel_id = Auth::user()->channels->id  ;
        $this->amount = 1000;
        $this->from_date = date('Y-m-d');
        $this->to_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + 1 years'));
    }
    public function render()
    {
        return view('livewire.channel-payment-component')->layout('layouts.master');
    }
    public function ChannelPayment()

    {
        $this->validate();

        ChannelPayment::create([
            'channel_id'=>$this->channel_id,
            'payment_type' => $this->payment_type,
            'amount'=>$this->amount,
            'account_no' => $this->account_no,
            'ref' => $this->ref,
            'from_date'=>$this->from_date,
            'to_date'=>$this->to_date,

        ]);
        $userup = Channel::where('id', $this->channel_id)
        ->update([
            'status' =>1
         ]);
         if ($userup) {
            return redirect('/');
         }



    }
}
