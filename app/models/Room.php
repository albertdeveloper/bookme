<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['user_id','name','description','room_type_id','price'];
    use HasFactory;

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}
