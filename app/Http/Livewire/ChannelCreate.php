<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use App\Models\User;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Division;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChannelCreate extends Component
{

    public $district;
    public $name;
    public $phone;
    public $address;
    public $divisions;
    public $districts;
    public $images;
    use WithFileUploads;
    public $selectedDivision = NULL;
    protected $rules = [
        'name' => 'required|min:6',
        'phone' => 'digits:11|unique:channels',
        'address' => 'required',
        'images' => 'image|max:1024',
        'divisions' => 'required|min:6',
        'districts' => 'required',
    ];
    public function mount()
    {
        $this->divisions = Division::all();
        $this->districts = collect();
        $this->retrieveContent();
    }
    public function updatedSelectedDivision($division)
    {
        if (!is_null($division)) {
            $this->districts = District::where('division_id', $division)->get();
        }
    }
    public function render()
    {
        return view('livewire.channel-create')->layout('layouts.master');
    }

    public function retrieveContent()
    {
       $channel = auth()->user()->channel;
       if ($channel=='yes') {
        return redirect('/');
        }
    }
    public function resets()
    {
        $this->selectedDivision=' ';
        $this->district=' ';
         $this->name=' ';
         $this->phone=' ';
          $this->address=' ';
    }
    public function createchannel()

    {
        $this->validate();
        $usrid=auth()->user()->id;
        // foreach ($this->images as $key => $image) {
        //     $this->images[$key] = $image->store('images','public');
        // }
        // $this->images = json_encode($this->images);
        $rules['name'] = $this->images->store('banner','public');
        $this->images = json_encode($this->images);
        Channel::create([
            'user_id'=>$usrid,
            'division' => $this->selectedDivision,
            'district'=>$this->district,
            'name' => $this->name,
            'slug' => slugify($this->name),
            'image' => $rules['name'],
            'phone' => $this->phone,
            'address'=>$this->address,

        ]);
        $userup = User::where('id', $usrid)
        ->update([
            'channel' =>'yes'
         ]);
         if ($userup) {
            return redirect('/');
         }

        $this->resets();


    }
}
