<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //modelio vardas - ka gali daryti
        $permissions = [
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'user-show',
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',
            'role-show',
            'permission-view',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-show',
            'ikelti-preke',
            'redaguoti-preke',
            'view-buy'

        ];
        foreach($permissions as $permission){
            Permission::create(['name' => $permission]);
        }

    }
}
