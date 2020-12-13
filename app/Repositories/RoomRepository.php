<?php
namespace App\Repositories;

use App\Models\Room;

class RoomRepository implements RoomRepositoryContract
{
    public function get($request)
    {
        $query = Room::query();
        $query->whereHas('roomType',function($q) use($request) {
            if(isset($request['room_type'])) $q->where('room_types.title_slug',$request['room_type']);
        });

        return $query->paginate(10);
    }
}
