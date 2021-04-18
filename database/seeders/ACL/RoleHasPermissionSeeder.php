<?php

namespace Database\Seeders\ACL;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Permission::all() as $val) {
            DB::table('role_has_permissions')->insert([
                'role_id' => 1,
                'permission_id' => $val->id
            ]);
        }
    }
}
