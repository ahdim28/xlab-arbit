<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ACL\PermissionSeeder;
use Database\Seeders\ACL\RoleHasPermissionSeeder;
use Database\Seeders\ACL\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RoleSeeder::class,
            // PermissionSeeder::class,
            // RoleHasPermissionSeeder::class,
            UserSeeder::class,
            ConfigurationSeeder::class
        ]);
    }
}
