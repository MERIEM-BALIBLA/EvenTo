<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         

        $this->call(RoleSeed::class);
        $this->call(PermissionSeed::class);

        $rolePermissions = [
            'organ' => ['Add event', 'edit event', 'delete event'],
            'admin' => ['Add category', 'edit category', 'delete category', 'Add user', 'edit user', 'delete user']
        ];

        foreach ($rolePermissions as $roleName => $permissionNames) {
            $role = Role::where('name', $roleName)->first();
            foreach ($permissionNames as $permissionName) {
                $permission = Permission::where('name', $permissionName)->first();
                if ($role && $permission) {
                    $role->givePermissionTo($permission);
                }
            }
        }

    }
}
