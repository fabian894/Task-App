<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'username' => 'alicej',
                'email' => 'alice@example.com',
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Smith',
                'username' => 'bobsmith',
                'email' => 'bob@example.com',
            ],
            [
                'first_name' => 'Clara',
                'last_name' => 'Lee',
                'username' => 'claralee',
                'email' => 'clara@example.com',
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Wong',
                'username' => 'davidw',
                'email' => 'david@example.com',
            ],
            [
                'first_name' => 'Eve',
                'last_name' => 'Nguyen',
                'username' => 'evenguyen',
                'email' => 'eve@example.com',
            ],
        ]);
    }
}
