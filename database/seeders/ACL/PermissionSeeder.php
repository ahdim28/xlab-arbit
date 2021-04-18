<?php

namespace Database\Seeders\ACL;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            0 => [
                'parent' => null,
                'name' => null,
            ],
        ];

        foreach ($permissions as $val) {
            Permission::create([
                'parent' => $val['parent'],
                'name' => $val['name'],
                'guard_name' => 'web',
            ]);
        }
    }
}
