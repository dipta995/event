<?php

namespace App\Http\Livewire;

use App\Models\PostReport;
use Livewire\Component;

class ReportComponent extends Component
{
    public $postId;
    public $comment;
    public function render()
    {

        return view('livewire.report-component')->layout('layouts.master');
    }
    public function mount($post_id)
    {
        $this->postId = $post_id;
        if (PostReport::where('user_id',auth()->id())->where('post_id',$this->postId)->first()){
            return $this->redirectRoute('customer.home');
        }
    }

public function reportChannelPost(){
        if (PostReport::where('user_id',auth()->id())->where('post_id',$this->postId)->first()){
            return $this->redirectRoute('customer.home');
        }else{

        $row = new PostReport();
        $row->user_id = auth()->id();
        $row->post_id = $this->postId;
        $row->comment = $this->comment;
        $row->save();
            return $this->redirectRoute('customer.home');
    }
}
}
