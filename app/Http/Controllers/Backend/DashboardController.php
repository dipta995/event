<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Package;
use App\Models\PackageOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.pages.dashboard.index');
    }


    public function removepostImage()
    {
        $images = Image::find(\request('id'))->image;


        $imageToRemove = \request('image');

// Decode the JSON string to an array
        $decodedImages = json_decode($images, true);

// Remove the specified image from the array
        $updatedImages = array_filter($decodedImages, function ($image) use ($imageToRemove) {
            return $image !== $imageToRemove;
        });

// Convert the updated array to the old format
        $oldFormat = json_encode(array_values($updatedImages));

// Output the updated array in the old format





        $row = Image::find(\request('id'));
        $row->image = $oldFormat;
        $row->save();
        return back();

    }
    public function removepackageImage()
    {
        $images = Package::find(\request('id'))->images;
        $imageToRemove = \request('image');
// Decode the JSON string to an array
        $decodedImages = json_decode($images, true);

// Remove the specified image from the array
        $updatedImages = array_filter($decodedImages, function ($image) use ($imageToRemove) {
            return $image !== $imageToRemove;
        });

// Convert the updated array to the old format
        $oldFormat = json_encode(array_values($updatedImages));

// Output the updated array in the old format





        $row = Package::find(\request('id'));
        $row->images = $oldFormat;
        $row->save();
        return back();

    }
}
