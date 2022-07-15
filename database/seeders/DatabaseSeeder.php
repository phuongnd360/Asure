<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Super Admin',
               'email'=>'admin@testec.io',
               'password'=> bcrypt('12345678'),
               'type'=>0,
               'created_by'=>0
            ],
            [
               'name'=>'Student',
               'email'=>'student@testec.io',
               'type'=> 1,
               'password'=> bcrypt('12345678'),
               'created_by'=>0
            ],
            [
               'name'=>'Mentor',
               'email'=>'mentor@testec.io',
               'password'=> bcrypt('12345678'),
               'type'=>2,
               'created_by'=>0
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

