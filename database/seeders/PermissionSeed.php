<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'Add event'],
            ['name' => 'edit event'],
            ['name' => 'delete event'],

            ['name' => 'Add category'],
            ['name' => 'edit category'],
            ['name' => 'delete category'],
            ['name' => 'Add user'],
            ['name' => 'edit user'],
            ['name' => 'delete user'],
        ];

        foreach($permissions as $permission){
            Permission::create($permission);
        }
    }
}
