<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Daniel',
            'username' => 'd-grab',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'user_type' => UserType::TYPE_ADMIN,
            'phone' => '+44923432454'
        ]);
    }
}
