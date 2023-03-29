<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->first();
        $permissions = Permission::pluck('id')->toArray();
        $role->permissions()->sync($permissions);
        $roles = Role::pluck('id')->toArray();
        $user = User::where('username','admin')->first();
        $user->roles()->attach([$role->id]);
        $user->permissions()->sync($permissions);
    
    }
}
