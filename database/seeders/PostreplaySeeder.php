<?php

namespace Database\Seeders;

use App\Models\Postreplay;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class PostreplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,200) as $index)
        {
            $faker = FakerFactory::create();

            Postreplay::create([
                "comment_id"=>rand(1,80),
                "replay"=>$faker->paragraph,
                "user_id"=>rand(1,20),

                //$this->faker->sentence

            ]);
        }
    }
}
