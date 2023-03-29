<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [ 'name' => 'admin','username' => 'Admin','email' => 'admin@gmail.com', 'password' => bcrypt('admin@123')],
            [ 'name' => 'admin','username' => 'Editor','email'=> 'editor@gmail.com', 'password' => bcrypt('editor@123')],
            [ 'name' => 'admin','username' => 'Supervisor','email' => 'supervisor@gmail.com', 'password' => bcrypt('supervisor@123')]
         ];
        User::insert($data);

    }
}
