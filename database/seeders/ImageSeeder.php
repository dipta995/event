<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        $i=0;
        foreach(range(1,20) as $index)
        {
            $i++;
            Image::create([
                "post_id"=>$i,
                "image"=>$faker->imageUrl(),


            ]);
        }
    }
}
