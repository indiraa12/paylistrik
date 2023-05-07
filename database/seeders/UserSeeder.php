<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                "name" => "Administrator",
                "username" => "admin",
                "password" => bcrypt("password"),
                "nomor_kwh" => "-",
                "alamat" => "-",
                "remember_token" => Str::random(10),
                "role_id" => 1,
            ],
            [
                "name" => "Indi Rahmadani",
                "username" => "indi",
                "password" => bcrypt("password"),
                "nomor_kwh" => "234567890123",
                "alamat" => "Jl. Jalan",
                "remember_token" => Str::random(10),
                "role_id" => 2,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
