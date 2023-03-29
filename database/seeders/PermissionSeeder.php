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

        $data =[
            [ 'name'=>'Create User','slug'=>'create-user'],
            [ 'name'=>'Edit User','slug'=>'edit-user'],
            [ 'name'=>'View User','slug'=>'view-user'],
            [ 'name'=>'Delete User','slug'=>'delete-user'],
             [ 'name'=>'Change User Status','slug'=>'change-user-status'],
            [ 'name'=>'Create Role','slug'=>'create-role'],
            [ 'name'=>'Edit Role','slug'=>'edit-role'],
            [ 'name'=>'View Role','slug'=>'view-role'],
            [ 'name'=>'Delete Role','slug'=>'delete-role'],

            
            

        ];
        Permission::insert($data);
    }
}
