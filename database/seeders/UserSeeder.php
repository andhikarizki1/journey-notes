<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\DetailUser;
use Hash;
use Str;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            // [
            //     'username' => 'andri',
            //     'namalngkp' => 'Andri Hendrawan',
            //     'email' => 'andri@gmail.com',
            //     'foto' => 'profil.png',
            //     'password' => Hash::make('1234567890123456'),
            //     'remember_token' => Str::random(100)
            // ],
            // [
            //     'username' => 'abang',
            //     'namalngkp' => 'Andhika Rizki',
            //     'email' => 'abang@gmail.com',
            //     'foto' => 'profil.png',
            //     'password' => Hash::make('1234567890123456'),
            //     'remember_token' => Str::random(100)
            // ],
            // [
            //     'username' => 'ikhsan',
            //     'namalngkp' => 'Muhammad Ikhsan',
            //     'email' => 'ikhsan@gmail.com',
            //     'foto' => 'profil.png',
            //     'password' => Hash::make('1234567890123456'),
            //     'remember_token' => Str::random(100)
            // ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
