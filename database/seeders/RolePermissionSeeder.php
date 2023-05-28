<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // Create Roles
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);


        // Permission List as array
        $permissions = [

            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'report',
                'permissions' => [
                    // report Permissions
                    'report.view',
                    'report.delete',
                ]
            ],
            [
                'group_name' => 'channel',
                'permissions' => [
                    // role Permissions
                    'channel.view',
                    'channel.delete',
                ]
            ],
            [
                'group_name' => 'package',
                'permissions' => [
                    // role Permissions
                    'package.view',
                    'package.delete',
                ]
            ],
            [
                'group_name' => 'package_order',
                'permissions' => [
                    // role Permissions
                    'package_order.view',
                    'package_order.delete',
                ]
            ],

            [
                'group_name' => 'channel_payment',
                'permissions' => [
                    // role Permissions
                    'channel_payment.view',
                    'channel_payment.delete',
                ]
            ],

            [
                'group_name' => 'profile',
                'permissions' => [
                    // profile Permissions
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }

        //to register super admin at model has roles table
        //here role_id =superadmin model_id=customer_id
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' => 1

        ]);
    }
}
