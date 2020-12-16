<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_default_permissions = array(
            'user_management_access',
            'users_destroy',
            'users_process',
            'users_access',
            'roles_destroy',
            'roles_process',
            'roles_access',
            'permissions_destroy',
            'permissions_process',
            'permissions_access',
            'profile_access',

        );


        foreach ($list_default_permissions as $k => $val) {
            Permission::create([
                'title' => $val
            ]);
        }
    }
}
