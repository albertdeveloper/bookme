<?php
namespace App\Repositories;

use App\Models\RoomType;

class RoomTypeRepository implements RoomTypeRepositoryContract
{
    public function get()
    {
        return RoomType::paginate(10);
    }

    public function process($request)
    {
         RoomType::updateOrCreate(['id'=>$request->id],
         [
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
         ]);
    }

    public function findById($id)
    {
         return RoomType::findOrfail($id);
    }

    public function delete($id)
    {
        $type = $this->findById($id);
        $type->delete();
    }
}
