<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\Image;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChannelPostComponent extends Component
{
    public function render()
    {
        if (auth()->user()->channel=='yes') {

            $mychannel = Channel::where('user_id',auth()->user()->id)->first();
        }
else {
    $mychannel = Null;
}
        return view('livewire.channel-post-component',compact('mychannel'));
    }

    use WithFileUploads;
    public $images = [];
    public $post_text;
//public $channel_id;

    public function addpost($channelid)
    {
        $this->validate([
            'post_text'=>'required|max:300',
            'images.*' => 'image|max:1024',
        ]);
        $slug = slugify($this->post_text);
        Post::create([
            'channel_id'=>$channelid,
            'post_text' => $this->post_text,
            'slug' => $slug,
            'tags'=>'tag one'
        ]);
        $postfind = Post::where('slug',$slug)->first();
        $postid = $postfind->id;
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images','public');
        }
        $this->images = json_encode($this->images);
        Image::create([
            'post_id'=>$postid,
            'image' => $this->images
        ]);
        session()->flash('info', 'Images has been successfully Uploaded.');
        return redirect()->to('/');

    }


    public function removeMe($index)
{
        array_splice($this->images, $index, 1);
}


}
