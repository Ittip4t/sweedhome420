<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
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
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'create-user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('create-user');
        $role1->givePermissionTo('update-user');

        $role2 = Role::create(['name' => 'super-admin']);
        $role3 = Role::create(['name' => 'user']);
        $role3->givePermissionTo('update-user');
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'username' => 'itp_psm',
            'email' => 'admin@example.com',
            'fname' => 'ittipat',
            'lname' => 'pliansamai',
            'email_verified_at' => null,
            'password' => Hash::make('password')
        ]);
        $user->assignRole('admin');
        $user = \App\Models\User::factory()->create([
            'username' => 'meen_38',
            'email' => 'superadmin@example.com',
            'fname' => 'mananya',
            'lname' => 'kongraksawet',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('super-admin');

        
        $user = \App\Models\User::factory()->create([
            'username' => 'lnwza007',
            'email' => 'lnwza007@example.com',
            'mname' => 'lnwza007',
            'password' => Hash::make('password')
        ]);
        $user->assignRole('user');
        $user = \App\Models\User::factory()->create([
            'username' => 'null007',
            'email' => 'null007@example.com',
            'password' => Hash::make('password'),
            'mname' => 'null007'
        ]);
    }
}
