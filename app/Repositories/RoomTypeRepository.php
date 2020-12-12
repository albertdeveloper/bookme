<?php
namespace App\Repositories;

use App\Models\RoomType;

class RoomTypeRepository implements RoomTypeRepositoryContract
{
    public function get()
    {
        return RoomType::paginate(10);
    }
}
