<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'rayen',
            'email' => 'rayengrid@gmail.com',
            'password' => ('rayengrid'),
            'role' => 'admin',
        ]);
    }
}
