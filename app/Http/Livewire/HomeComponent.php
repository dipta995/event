<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Channellike;
use App\Models\Image;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Postcomment;
use App\Models\Postlike;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Livewire\Component;
use Livewire\WithFileUploads;


class HomeComponent extends Component
{
    public $divisions;
    public $text;
    public $districts;
    public $district;
    public $selectedDivision = NULL;
    //pagination zone
    public $perPage = 5;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];
    public function loadMore()
    {
        $this->perPage = $this->perPage + 5;
    }
    //pagination zone

    public $comment;
    public function resetcomment()
    {
        $this->comment=' ';
    }
    public function render()
    {

        if (auth()->user()->channel=='yes') {

            $mychannel = Channel::where('user_id',auth()->user()->id)->first();
        }
else {
    $mychannel = Null;
}
        $posts = Post::where('status','published')->latest()->paginate($this->perPage);
        return view('livewire.home-component',compact('posts','mychannel'))->layout('layouts.master');
    }
    public function mount()
    {
        $this->divisions = Division::all();
        $this->districts = collect();
    }
    public function updatedSelectedDivision($division)
    {
        if (!is_null($division)) {
            $this->districts = District::where('division_id', $division)->get();
        }
    }
    public function addPostLike($user_id,$post_id)
    {

        $usrid=auth()->user()->id;


        $postlike = Postlike::where('user_id',$usrid)->where('post_id',$post_id)->where('like','no');
        if ($postlike->count()>0) {
            Postlike::where('user_id', $user_id)->where('post_id', $post_id)
        ->update([
            'like' =>'yes'
         ]);
        }else{
            $send = Postlike::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
                'like'=>"yes"
            ]);
        }



            //session()->flash('message','Student Created');

            //$this->resetInputField();
            //$this->emit('studentAdded');


    }
    public function removePostLike($user_id,$post_id)
    {
        Postlike::where('user_id', $user_id)->where('post_id', $post_id)
        ->update([
            'like' =>'no'
         ]);
    }

    public function addcomment($postid)
    {
        $userid = auth()->user()->id;

       Postcomment::create([
            'user_id' => $userid,
            'post_id' => $postid,
            'comment'=>$this->comment,
        ]);
        $this->resetcomment();
    }

    public function addChannelLike($user_id,$channel_id)
    {
dd($this->district_id);
        $usrid=auth()->user()->id;
        $channellike = Channellike::where('user_id',$usrid)->where('channel_id',$channel_id)->where('like','no');
        if ($channellike->count()>0) {
            Channellike::where('user_id', $user_id)->where('channel_id', $channel_id)
            ->update([
            'like' =>'yes'
         ]);
        }else{
            $send = Channellike::create([
                'user_id' => $user_id,
                'channel_id' => $channel_id,
                'like'=>"yes"
            ]);
        }
        $reciverid = Channel::where('id',$channel_id)->first();

        Notification::create([
            'user_id' => $reciverid->user_id,
            'channel_id' => $channel_id,
            'reciver'=>"admin",
            'link'=>"#",
            'read'=>"no",
            'brif'=>"you have new Subscription"
        ]);
        $this->emit('refreshComponent');




    }

    public function removeChannelLike($user_id,$channel_id)
    {
        Channellike::where('user_id', $user_id)->where('channel_id', $channel_id)
        ->update([
            'like' =>'no'
         ]);
         $this->emit('refreshComponent');
    }





}
