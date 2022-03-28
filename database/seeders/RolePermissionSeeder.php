<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        //permission list as array
        $permissions =[
            //dashbord permission
            'dashboard.view',
            //blog permissions
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',

            //role permissions
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',

            //admin permissions
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',

            //profile permissions
            'profile.create',
            'profile.view',
            'profile.edit',
            'profile.delete',
            'profile.approve',
        ];

        //create and assign permission
        for ($i=0; $i < count($permissions); $i++) {
            //create permission
            $permission = Permission::create(['name'=>$permissions[$i]]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
    }
}
