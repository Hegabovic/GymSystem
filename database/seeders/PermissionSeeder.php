<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'permission_create_Gym',
            'permission_delete_Gym',
            'permission_update_Gym',
            'permission_show_Gym',
            'permission_create_GymManager',
            'permission_delete_GymManager',
            'permission_update_GymManager',
            'permission_show_GymManager',
            'permission_create_trainingSession',
            'permission_delete_trainingSession',
            'permission_update_trainingSession',
            'permission_show_trainingSession',
            'permission_create_couch',
            'permission_delete_couch',
            'permission_update_couch',
            'permission_select_couch',
            'user_register',
            'permission_buy_package',
            'user_register',
            'user_login',
            'user_update',
            'user_remaining_sessions'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $adminRole = Role::create(['name' => 'Admin']);
        $cityManagerRole = Role::create(['name' => 'CityManager']);
        $gymManagerRole = Role::create(['name' => 'GymManager']);
        $userRole = Role::create(['name' => 'User']);

        $userPermissions = [
            'user_register',
            'user_login',
            'user_update',
            'user_remaining_sessions'
        ];

        $gymMangerPermissions = [
            'permission_create_trainingSession',
            'permission_delete_trainingSession',
            'permission_update_trainingSession',
            'permission_show_trainingSession',
            'permission_create_couch',
            'permission_delete_couch',
            'permission_update_couch',
            'permission_select_couch',
            'user_register',
            'permission_buy_package',
            ...$userPermissions
        ];

        $cityMangerPermissions = [
            'permission_create_Gym',
            'permission_delete_Gym',
            'permission_update_Gym',
            'permission_show_Gym',
            'permission_create_GymManager',
            'permission_delete_GymManager',
            'permission_update_GymManager',
            'permission_show_GymManager',
            ...$gymMangerPermissions
        ];

        foreach ($permissions as $permission) {
            $adminRole->givePermissionTo($permission);
        }

        foreach ($userPermissions as $permission) {
            $userRole->givePermissionTo($permission);
        }
        foreach ($gymMangerPermissions as $permission) {
            $gymManagerRole->givePermissionTo($permission);
        }
        foreach ($cityMangerPermissions as $permission) {
            $cityManagerRole->givePermissionTo($permission);
        }
    }
}
