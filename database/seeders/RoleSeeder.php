<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['id'=>1, 'name' => 'admin'],
            ['id'=>2, 'name' => 'user']
        ];
        foreach($roles as $role){
            Role::create($role);
        }
       
    }
}
