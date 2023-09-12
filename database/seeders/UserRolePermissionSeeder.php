<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $staff = User::create(array_merge([
                'email' => 'staff@gmail.com',
                'name' => 'staff',
            ], $default_user_value));
            $spv = User::create(array_merge([
                'email' => 'spv@gmail.com',
                'name' => 'spv',
            ], $default_user_value));
            $manager = User::create(array_merge([
                'email' => 'manager@gmail.com',
                'name' => 'manager',
            ], $default_user_value));
            $operator = User::create(array_merge([
                'email' => 'operator@gmail.com',
                'name' => 'operator',
            ], $default_user_value));
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
            ], $default_user_value));

            $role_staff = Role::create(['name' => 'Staff']);
            $role_spv = Role::create(['name' => 'SPV']);
            $role_manager = Role::create(['name' => 'Manager']);
            $role_operator = Role::create(['name' => 'Operator']);
            $role_admin = Role::create(['name' => 'admin']);

            $permission = Permission::create(['name' => 'Read']);
            $permission = Permission::create(['name' => 'Create']);
            $permission = Permission::create(['name' => 'Update']);
            $permission = Permission::create(['name' => 'Delete']);
            $permission = Permission::create(['name' => 'Confirm']);
            Permission::create(['name' => 'Read Config']);

            $role_admin->givePermissionTo('Read');
            $role_admin->givePermissionTo('Create');
            $role_admin->givePermissionTo('Update');
            $role_admin->givePermissionTo('Delete');
            $role_admin->givePermissionTo(['Confirm','Read Config']);
            

            $staff->assignRole('staff');
            $staff->assignRole('spv');
            $spv->assignRole('spv');
            $manager->assignRole('manager');
            $operator->assignRole('operator');
            $admin->assignRole('admin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
