<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::firstOrCreate([
            'name'      => 'Thuần Huỳnh',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('123456'),
            'email_verified_at'=>now(),
            'sex'       => 1,
            'phone'     => '01111111112',
            'active'    => 1,
        ]);
    }
}
