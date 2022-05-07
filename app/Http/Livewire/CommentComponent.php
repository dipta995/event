<?php

namespace App\Http\Livewire;

use App\Models\Postcomment;
use Brian2694\Toastr\Facades\Toastr;
use Livewire\Component;

class CommentComponent extends Component
{
    public $comment;
    public $postid;
    public function resetcomment()
    {
        $this->comment=' ';
    }

    public function addcomment()
    {
        $userid = auth()->user()->id;
        $this->validate([
            'comment'=>'required|max:150',

        ]);
       Postcomment::create([
            'user_id' => $userid,
            'post_id' => $this->postid,
            'comment'=>$this->comment,
        ]);
        $this->resetcomment();
        return Toastr::success('Post added successfully :)','Success');
    }
    public function render()
    {
        return <<<'blade'
            <div>
            <form>
            <textarea wire:model="comment" placeholder="Post your comment"></textarea>
            @error('comment') <span class="error">{{ $message }}</span> @enderror
            <button class="btn btn-info" wire:click.prevent="addcomment"  type="submit">Comment</button>
        </form>
            </div>
        blade;
    }
}
