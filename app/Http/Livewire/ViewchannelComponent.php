<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Channel;
use App\Models\Channellike;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Postcomment;
use App\Models\Postlike;



class ViewchannelComponent extends Component
{

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
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
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

$channelid = Channel::where('slug',$this->slug)->first();
if (is_null($channelid)) {
    $posts = Post::where('channel_id',0)->latest()->paginate($this->perPage);
    }
else{
    $posts = Post::where('channel_id',$channelid->id)->latest()->paginate($this->perPage);
}


        return view('livewire.viewchannel-component',compact('posts','mychannel'))->layout('layouts.master');
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

