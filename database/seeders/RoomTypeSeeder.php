<?php

namespace Database\Seeders;

use App\Models\Room;
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

        DB::table('rooms')->delete();
        DB::table('room_types')->delete();

        for($i = 0; $i < 100; $i++) {
            $company = $faker->company;
            RoomType::create([
                'user_id' => $user->id,
                'title' => $company,
                'slug' => $company,
                'description' => $faker->sentence,
            ]);
        }

    }
}
