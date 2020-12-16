<?php
namespace App\Repositories;

use App\Models\Permission;

class PermissionRepository implements PermissionRepositoryContract
{
    public function get(){
        return Permission::paginate(10);
    }

    public function process($request)
    {
        Permission::updateOrCreate(['id'=>$request->id],
        [
            'title' => $request->title,
        ]);
    }

    public function findById($id)
    {
         return Permission::findOrfail($id);
    }

    public function list()
    {
        return Permission::get();
    }

}
