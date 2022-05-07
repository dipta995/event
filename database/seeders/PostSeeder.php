<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        foreach(range(1,20) as $index)
        {

            $name = $faker->unique()->name;
            Post::create([
                "channel_id"=>rand(1,10),
                "post_text"=>$faker->paragraph,
                "slug"=>slugify($name),
                "tags"=>"tag1",
                //$this->faker->sentence

            ]);
        }
    }
}
