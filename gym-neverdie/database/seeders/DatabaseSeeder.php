<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Database\Seeders\MembershipSeeder; 
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        User::where('email', 'admin@example.com')->delete();

        // Membuat roles jika belum ada
        $adminRole = Role::firstOrCreate(['name' => 'admin'], ['guard_name' => 'web']);
        $userRole = Role::firstOrCreate(['name' => 'user'], ['guard_name' => 'web']);

        // Membuat permissions jika belum ada
        $permissions = [
            'view posts',
            'create posts',
            'delete posts',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        // Memberikan permissions ke admin role
        $adminRole->syncPermissions(['view posts', 'create posts', 'delete posts']);

        // Memberikan permissions ke user role (hanya 'view posts')
        $userRole->syncPermissions(['view posts']);

        // Membuat user baru
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
        ]);

        // Assign role 'admin' dan update role_id
        $user->assignRole($adminRole->name);
        $user->update(['role_id' => $adminRole->id]);

        
    }
}
