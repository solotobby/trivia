<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('id', 1)->first();

        $users = [
            ['id' => 1, 'name' => 'Oluwatobi Solomon',  'email' => '8dotcom@gmail.com', 'username'=>'8dotcom', 'password' => bcrypt(env('ADMIN_PASSWORD1'))],
            ['id' => 2, 'name' => '8.com', 'email' => '28dotcom@gmail.com', 'username'=>'28dotcom', 'password' => bcrypt(env('ADMIN_PASSWORD2'))],
            ['id' => 3, 'name' => '28dot.com', 'email' => '28.com@gmail.com', 'username'=>'28.com', 'password' => bcrypt(env('ADMIN_PASSWORD3'))]
        ];

        foreach ($users as $user) {
            $user = User::create($user);
            $user->assignRole($adminRole->id);
            Wallet::create(['user_id' => $user->id]);
        }
    }
}
