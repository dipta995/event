<?php

namespace Database\Seeders;

use App\Models\Postcomment;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;


class PostcommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,80) as $index)
        {
            $faker = FakerFactory::create();

            Postcomment::create([
                "post_id"=>rand(1,20),
                "comment"=>$faker->paragraph,
                "user_id"=>rand(1,20),

                //$this->faker->sentence

            ]);
        }
    }
}
