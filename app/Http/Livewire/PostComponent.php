<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Channellike;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Postcomment;
use App\Models\Postlike;
use App\Models\Postreplay;
use Livewire\Component;

class PostComponent extends Component
{

    public $slug;
    public $commentid;
    public $replayid;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $post = Post::where('slug',$this->slug)->first();
        // $allcomment = Postcomment::where('post_id',$post->id)->paginate($this->perPage);

        return view('livewire.post-component',compact('post'))->layout('layouts.master');
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
    public function commentdelete($commentid)
    {
        Postcomment::where('id', $commentid)->delete();
    }
    public function replaytdelete($replayid)
    {
        Postreplay::where('id', $replayid)->delete();
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

    public function deletePost($postId){
        $row = Post::find($postId);
        $row->delete();
        return $this->redirectRoute('customer.home');

    }
}
