<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPostComponent extends Component
{
    use WithFileUploads;

    public $postId;
    public $post_text;
    public $images_all;
    public $imageId;
    public $banner;
    public $images = [];
    public function render()
    {
        return view('livewire.edit-post-component')->layout('layouts.master');
    }
    public function mount($id)
    {
        $this->postId = $id;
        $row = Post::find($this->postId);
        $this->post_text =$row->post_text;
        $this->images_all =$row->postimage->image;
        $this->imageId =$row->postimage->id;

    }
    public function updatePost()
    {

        $row = Post::find($this->postId);
        $row->post_text = $this->post_text;
//        $row->banner = $this->banner;
        $row->save();
        $postfind = Post::find($this->postId);
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images','public');
        }
        if ($this->images !== null) {
            $existingImagesArray = \GuzzleHttp\json_decode($this->images_all, true); // Convert string to an array

            $mergedImagesArray = array_merge($existingImagesArray, $this->images); // Merge the two arrays

            $updatedImages = json_encode($mergedImagesArray); // Convert the merged array back to a JSON string
            $up = Image::find($this->imageId);
//            dd($updatedImages);
            $up->image = $updatedImages;
//            dd($up);
            $up->save();
            return redirect('/post/edit/'.$this->postId);
        }


    }


}
