<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [ 'name'=>'Admin','slug'=>'admin'],
            [ 'name'=>'Editor','slug'=>'editor'],
            [ 'name'=>'supervisor','slug'=>'uservisor']
        ];
        Role::insert($data);
    }
}
