<?php

namespace Database\Seeders;

use App\Models\Channellike;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;
class ChannellikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        foreach(range(1,200) as $index)
        {
            Channellike::create([
                "channel_id"=>rand(1,10),
                "user_id"=>rand(1,20),
            ]);
        }
    }
}
