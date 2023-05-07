<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPostComponent extends Component
{
    public $postId;
    public $post_text;
    public $banner;
    public function render()
    {
        return view('livewire.edit-post-component')->layout('layouts.master');
    }
    public function mount($id)
    {
        $this->postId = $id;
        $row = Post::find($this->postId);
        $this->post_text =$row->post_text;

    }
    public function updatePost()
    {
        $row = Post::find($this->postId);
        $row->post_text = $this->post_text;
        $row->banner = $this->banner;
        $row->save();
        return back();
    }
}
