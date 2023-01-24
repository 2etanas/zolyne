<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User:: create([
            'name' => 'Povilas',
            'email' => 'povilas.b5@gmail.com',
            'password' => Hash::make('testtest')
        ]);

        $role = Role::find(1);

            
        $permission = Permission::pluck('id', 'id')->all(); //sudeti teises ir roles i rysio lentele
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);    
        //roles superadmin priskirti visas teises
            //role priskirti sio konkretaus vartotojo

    }
}
