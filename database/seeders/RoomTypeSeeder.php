<?php

namespace Database\Seeders;

use App\Models\RoomType;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker =  Factory::create();
        $user = User::first();

        RoomType::truncate();
        for($i = 0; $i < 10; $i++) {
            RoomType::create([
                'user_id' => $user->id,
                'title' => $faker->company,
                'description' => $faker->sentence,
            ]);
        }

    }
}
