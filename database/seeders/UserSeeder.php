<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'username' => 'administrator',
            'password' => bcrypt('admin123'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'username' => 'user',
            'password' => bcrypt('user123'),
            'role_id' => 2,
        ]);

        // $user = User::where('role_id', 1)->first();
        // $user->createToken('admin-access')->plainTextToken();
    }
}
