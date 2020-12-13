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

        $user = User::first();

        DB::table('rooms')->delete();
        DB::table('room_types')->delete();


        $room_type = array(
            'Single' => 'A room assigned to one person. May have one or more beds.',
            'Double' => 'A room assigned to two people. May have one or more beds.',
            'Triple' => 'A room assigned to three people. May have two or more beds.',
            'Quad' => 'A room assigned to four people. May have two or more beds.',
            'Queen' => 'A room with a queen-sized bed. May be occupied by one or more people.',
            'King' => 'A room with a king-sized bed. May be occupied by one or more people.',
            'Twin' => 'A room with two beds. May be occupied by one or more people.',
            'Double-double' => 'A room with two double (or perhaps queen) beds. May be occupied by one or more people.',
            'Studio' => 'A room with a studio bed – a couch that can be converted into a bed. May also have an additional bed',
        );
        foreach($room_type as  $title => $desc) {

            RoomType::create([
                'user_id' => $user->id,
                'title' => $title,
                'slug' => $title,
                'description' => $desc,
            ]);
        }

    }
}
