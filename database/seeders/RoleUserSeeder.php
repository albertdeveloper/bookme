<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create_role_admin = new Role();

        $create_role_admin->id = 1;
        $create_role_admin->title = 'Administrator';
        $create_role_admin->save();

        $create_role_user = new Role();

        $create_role_user->id = 2;
        $create_role_user->title = 'User';
        $create_role_user->save();



        $permissions = Permission::get();

        foreach ($permissions as $k => $value) {
            if (!in_array($value->id, $create_role_admin->permissions()->pluck('permissions.id')->toArray())) $create_role_admin->permissions()->attach($value->id);
            if (!in_array($value->id, $create_role_user->permissions()->pluck('permissions.id')->toArray())) $create_role_user->permissions()->attach($value->id);
        }
    }
}
