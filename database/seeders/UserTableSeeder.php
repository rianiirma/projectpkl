<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'irma',
            'email' => 'irma@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);
        User::create([
            'name' => 'feby',
            'email' => 'feby@admin.com',
            'password' => bcrypt('password'),
            'role' => 'guru',
        ]);

    }
}
