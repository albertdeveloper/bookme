<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Factory::create();
        $user = \App\Models\User::first();


        $roomType = RoomType::get();

        foreach($roomType as $type)
        {

            for($i = 0; $i < 5; $i++) {

                Room::create([
                    'user_id' => $user->id,
                    'room_type_id' => $type->id,
                    'name' => $faker->company,
                    'description' => $faker->sentence,
                    'price' => $faker->randomDigit
            ]);
        }


        }


    }
}
