<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
{
    $roles = [
        ['name' => 'client'],
        ['name' => 'organ'],
        ['name' => 'admin']
    ];

    foreach($roles as $roleData){
        $role = Role::create($roleData);
    }


    $user = User::create([
        'name' => 'user',
        'email' => 'user@example.com',
        'password' => bcrypt('password'),
    ]);
    $user->assignRole('client');

    $admin = User::create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
    ]);
    $admin->assignRole('admin');
}

}
