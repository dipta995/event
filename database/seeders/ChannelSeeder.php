<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;
class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        $i = 0;
        foreach(range(1,10) as $index)
        {
            $name = $faker->unique()->name;
            $i++;
            Channel::create([
                "user_id"=>$i,
                "name"=>$name,
                "phone"=>$faker->phoneNumber,
                "slug"=>slugify($name),
                "image"=>$faker->imageUrl(),
                "address"=>$faker->address,
                "division"=>"Barishal",
                "district"=>"Bhola",


            ]);
        }
    }
}
