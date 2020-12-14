<?php
namespace App\Repositories;

use App\Models\Room;

class RoomRepository implements RoomRepositoryContract
{
    public function get($request)
    {
        $query = Room::query();
        $query->whereHas('roomType',function($q) use($request) {
            if(isset($request['dropdown'])) $q->where('room_types.title_slug',$request['dropdown']);
        });

        if(isset($request['search'])) $query->where('name','like','%'.$request['search'].'%');

        return $query->paginate(10);
    }

    public function process($request)
    {
        Room::updateOrCreate(['id' => $request->id],
        [
            'user_id' => auth()->user()->id,
            'room_type_id' => $request->room_type,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
    }

    public function findById($id)
    {
        return Room::findOrfail($id);
    }
}
