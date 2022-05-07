<?php

namespace Database\Seeders;

use App\Models\Postlike;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;

class PostlikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        foreach(range(1,50) as $index)
        {
            Postlike::create([
                "post_id"=>rand(1,20),
                "user_id"=>rand(1,20),

            ]);
        }
    }
}
