<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'role_name' => 'admin',
            'created_at' => '2023-11-26 02:39:18',
            'updated_at' => '2023-11-26 02:39:18'
        ]);

        Role::create([
            'id' => 2,
            'role_name' => 'user',
            'created_at' => '2023-11-26 02:39:18',
            'updated_at' => '2023-11-26 02:39:18'
        ]);
    }
}
