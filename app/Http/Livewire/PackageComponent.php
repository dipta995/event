<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class PackageComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $price;
    public $discount;
    public $day;
    public $description;
    public $banner;
    public $images = [];

    public function render()
    {
        $data = Package::where('user_id',Auth::user()->id)->get();
        return view('livewire.package-component',compact('data'))->layout('layouts.master');
    }

    public function createpackage()
    {
        $rules = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'day' => 'required|min:1',
            'description' => 'required',
            'banner' => 'image|max:1024',
        ]);
        $usrid=auth()->user()->id;

        $rules['name'] = $this->banner->store('banner','public');
        $this->banner = json_encode($this->banner);
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images','public');
        }
        $this->images = json_encode($this->images);

        $create = Package::create([
            'user_id'=>auth()->user()->id,
            'name' => $this->name,
            'price'=>$this->price,
            'discount' => $this->discount,
            'slug' => slugify($this->name),
            'images' => $this->images,
            'banner' => $rules['name'],
            'day'=>$this->day,
            'description'=>$this->description,

        ]);
        if ($create) {
            return redirect('/packages');
         }


    }
    public function removeMe($index)
    {
            array_splice($this->images, $index, 1);
    }

}
