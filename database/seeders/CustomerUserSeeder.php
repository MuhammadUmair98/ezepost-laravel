<?php

namespace Database\Seeders;

use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'John',
                'username' => 'j-doe',
                'email' => 'john@example.com',
                'password' => bcrypt('securepassword'),
                'user_type' => UserType::TYPE_CUSTOMER,
                'phone' => '+1234567890',
            ],
            [
                'name' => 'Alice',
                'username' => 'alice89',
                'email' => 'alice@example.com',
                'password' => bcrypt('alicepassword'),
                'user_type' => UserType::TYPE_CUSTOMER,
                'phone' => '+9876543210',
            ],
            [
                'name' => 'Sarah',
                'username' => 'sarah123',
                'email' => 'sarah@example.com',
                'password' => bcrypt('sarahpass'),
                'user_type' => UserType::TYPE_CUSTOMER,
                'phone' => '+1555123456',
            ],
            [
                'name' => 'Michael',
                'username' => 'mike23',
                'email' => 'michael@example.com',
                'password' => bcrypt('mikepass'),
                'user_type' => UserType::TYPE_CUSTOMER,
                'phone' => '+4412345678',
            ],
            [
                'name' => 'Emily',
                'username' => 'emily_rose',
                'email' => 'emily@example.com',
                'password' => bcrypt('emilypass'),
                'user_type' => UserType::TYPE_CUSTOMER,
                'phone' => '+6123456789',
            ],
        ];

        foreach ($usersData as $userData) {
            User::create($userData);
        }
    }
}
