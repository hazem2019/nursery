<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $roles = [
            'super-admin' => 'Super Administrator',
            'admin' => 'Administrator',
            'manager' => 'Manager',
            'teacher' => 'Teacher',
            'accountant' => 'Accountant',
            'receptionist' => 'Receptionist',
            'parent' => 'Parent',
        ];

        foreach ($roles as $name => $label) {
            Role::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@nursery.local'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make('password123'),
                'locale' => 'en',
                'status' => 'active',
            ]
        );

        $admin->assignRole('super-admin');
    }
}
