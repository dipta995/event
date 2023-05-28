<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Faker\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();
        $user = User::where('email','dipta995@gmail.com')->first();
        if (is_null($user)) {

            $user = new User();
            $user->name = "Dipta Dey";
            $user->email = "dipta995@gmail.com";
            $user->phone="01632315698";
            $user->address="dhaka";
            $user->district="Bhola";
            $user->channel="no";
            $user->role="admin";
            $user->profile_photo_path=$faker->imageUrl;
            $user->password = Hash::make('12345678');
            $user->save();
        }
//        foreach(range(1,20) as $index)
//        {
//            User::create([
//                "name"=>$faker->name,
//                "email"=>$faker->email,
//                "phone"=>$faker->phoneNumber,
//                "address"=>$faker->address,
//                "district"=>"Bhola",
//                "channel"=>"no",
//                "role"=>"admin",
//                'profile_photo_path'=>$faker->imageUrl,
//                "password"=>bcrypt("12345678"),
//
//            ]);
//        }
    }
}
