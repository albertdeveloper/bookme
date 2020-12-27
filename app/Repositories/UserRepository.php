<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    public function get($request)
    {
        $query = User::query();
        if (isset($request['search'])) $query->where('name', 'like', '%' . $request['search'] . '%');
        return $query->paginate(10);
    }

    public function process($request)
    {
        User::updateOrCreate(['id' => $request->id], [
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]
        ]);
    }
}
