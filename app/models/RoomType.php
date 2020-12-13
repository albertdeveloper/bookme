<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RoomType extends Model
{
    protected $fillable = ['user_id','title','description','title_slug'];

    use HasFactory;

    public function setSlugAttribute($value)
    {
       $this->attributes['title_slug'] = Str::slug($value,'-');
    }
}
