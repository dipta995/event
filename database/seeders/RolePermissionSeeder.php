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
            [
                'group_name' => 'dashboard',
                'permissions' =>[
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            //blog permissions
            [
                'group_name' => 'blog',
                'permissions' =>[
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],

            //role permissions
            [
                'group_name' => 'role',
                'permissions' =>[
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],

            //admin permissions
            [
                'group_name' => 'admin',
                'permissions' =>[
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],

            //profile permissions
            [
                'group_name' => 'profile',
                'permissions' =>[
                    'profile.view',
                    'profile.edit',

                ]
            ],
        ];

        //create and assign permission
        for ($i=0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) {
            //create permission
            $permission = Permission::create(['name'=>$permissions[$i]['permissions'][$j],'group_name' => $permissionGroup]);
            $roleSuperAdmin->givePermissionTo($permission);
            $permission->assignRole($roleSuperAdmin);
        }
     }
    }
}
