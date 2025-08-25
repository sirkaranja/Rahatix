<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $organizer = Role::create(['name' => 'organizer']);
        $customer = Role::create(['name' => 'customer']);

        permission::create(['name' => 'manage users'])->assignRole($admin, $organizer);
        permission::create(['name' => 'manage events'])->assignRole($admin, $organizer);
        
        $admin-> givePermissionTo(['manage users', 'manage events']);
        $organizer-> givePermissionTo(['manage events']);



        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
