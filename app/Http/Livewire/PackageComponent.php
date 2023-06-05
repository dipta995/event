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
    public $packageID;
    public $images = [];
    public $images_all;
    public $updatePackage = false;
    public $addPackage = false;

    public function render()
    {
        $data = Package::where('user_id', Auth::user()->id)->get();
        return view('livewire.package-component', compact('data'))->layout('layouts.master');
    }

    public function addPackage()
    {
        $this->resetFields();
        $this->addPackage = true;
        $this->updatePackage = false;
    }

    public function createpackage()
    {
        $rules = $this->validate([
            'name' => 'required',
            'price' => 'required',
            'day' => 'required|min:1',
            'description' => 'required|max:200',
            'banner' => 'image|max:1024',
        ]);
        $usrid = auth()->user()->id;

        $rules['name'] = $this->banner->store('banner', 'public');
        $this->banner = json_encode($this->banner);
        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images', 'public');
        }
        $this->images = json_encode($this->images);

        $create = Package::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'slug' => slugify($this->name),
            'images' => $this->images,
            'banner' => $rules['name'],
            'day' => $this->day,
            'description' => $this->description,

        ]);
        $this->addPackage = false;

        if ($create) {
            return redirect('/packages');
        }


    }

    public function editPackage($id)
    {
        try {
            $row = Package::findOrFail($id);
            if (!$row) {
                session()->flash('error', 'Post not found');
            } else {
//                if (isset($this->banner)){
//                $rules['name'] = $this->banner->store('banner', 'public');
//                $this->banner = json_encode($this->banner);
//                }
//                if (!empty($this->images)){
//                foreach ($this->images as $key => $image) {
//                    $this->images[$key] = $image->store('images', 'public');
//                }
//                $this->images = json_encode($this->images);
//                }

                $this->packageID = $row->id;
                $this->name = $row->name;
                $this->price = $row->price;
                $this->discount = $row->discount;
                $this->day = $row->day;
                $this->description = $row->description;
                $this->banner = $row->banner;
                $this->images_all = $row->images;
                $this->updatePackage = true;
                $this->addPackage = false;

            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }

    }

    public function resetFields(){
       $this->name = "";
                $this->price = "";
                $this->discount = "";
                $this->day = "";
                $this->description = "";
                $this->banner = "";
                $this->updatePackage = false;
                $this->addPackage = false;
}

public function updatePackage()
{
    $rules['name'] = $this->banner->store('banner', 'public');
    $this->banner = json_encode($this->banner);
    foreach ($this->images as $key => $image) {
        $this->images[$key] = $image->store('images','public');
    }
    if ($this->images !== null) {
        $existingImagesArray = \GuzzleHttp\json_decode($this->images_all, true); // Convert string to an array

        $mergedImagesArray = array_merge($existingImagesArray, $this->images); // Merge the two arrays

        $updatedImages = json_encode($mergedImagesArray); // Convert the merged array back to a JSON string
        $newImages = $updatedImages;
    }
        Package::whereId($this->packageID)->update([
            'name' => $this->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'images' => $newImages,
            'banner' => $rules['name'],
            'day' => $this->day,
            'description' => $this->description,
        ]);
        $this->resetFields();
        $this->banner = '';
        $this->images = [];
        $this->updatePost = false;

}

public function cancelPackage()
{
    $this->addPackage = false;
    $this->updatePackage = false;
    $this->resetFields();
}

public function removeMe($index)
{
    array_splice($this->images, $index, 1);
}

    public function removepackageImage($imgdata,$id)
    {
        $images = Package::find($id)->images;
        $imageToRemove = $imgdata;
// Decode the JSON string to an array
        $decodedImages = json_decode($images, true);

// Remove the specified image from the array
        $updatedImages = array_filter($decodedImages, function ($image) use ($imageToRemove) {
            return $image !== $imageToRemove;
        });

// Convert the updated array to the old format
        $oldFormat = json_encode(array_values($updatedImages));

// Output the updated array in the old format



$this->images = $updatedImages;

        $row = Package::find($id);
        $row->images = $oldFormat;
        $row->save();
        $this->images = null;
        $this->editPackage($id);
        return redirect();

    }


}
