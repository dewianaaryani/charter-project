<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Member;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'type' => 1, // Admin
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0, // Regular user
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Adhitya',
                'email' => 'adhitya@gmail.com',
                'type' => 0, // Regular user
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $userData) {
            $user = User::create($userData);

            // If the user is of type 'user', create a member record
            if ($user->name === 'User') {
                Member::create([
                    'user_id' => $user->id,
                    'member_code' => 'MEM-' . str_pad($user->id, 5, '0', STR_PAD_LEFT),
                    'phone' => '081234567890', // Example phone
                    'address' => '123 Example Street',
                    'birth_date' => '2000-01-01',
                    'membership_type' => 'monthly',
                    'start_date' => now(),
                    'end_date' => now()->addMonth(),
                    'status' => 'active',
                ]);
            }
        }
    }
}
