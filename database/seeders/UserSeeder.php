<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            0 => [
                'name' => 'Super',
                'email' => 'super@gmail.com',
                'email_verified' => 1,
                'email_verified_at' => now(),
                'username' => 'super',
                'password' => Hash::make('super123'),
                'active' => 1,
                'active_at' => now(),
                'roles' => 'super',
            ],
        ];

        foreach ($users as $val) {
            $user = User::create([
                'name' => $val['name'],
                'email' => $val['email'],
                'email_verified' => $val['email_verified'],
                'email_verified_at' => $val['email_verified_at'],
                'username' => $val['username'],
                'password' => $val['password'],
                'active' => $val['active'],
                'active_at' => $val['active_at'],
            ]);

            $info = UserInformation::create([
                'user_id' => $user->id,
                'phone' => null,
                'address' => null,
            ]);

            $user->assignRole($val['roles']);
        }
    }
}
