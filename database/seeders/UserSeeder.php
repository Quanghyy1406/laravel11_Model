<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Thêm user QuangHuy1023@gmail.com
        User::create([
            'name' => 'Quang Huy',
            'email' => 'QuangHuy1023@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'roles' => 'View', // Nếu bảng users có cột roles
        ]);

        // Tạo 100 user khác bằng factory
        User::factory()->count(100)->create();
    }
}