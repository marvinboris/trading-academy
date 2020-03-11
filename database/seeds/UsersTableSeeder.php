<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'role_id' => 1,
            'ref' => 'GITDEV',
            'sponsor' => '0',
            'is_active' => 1,
            'is_verified' => 1,
            'first_name' => 'Trading',
            'last_name' => 'Academy',
            'email' => 'trading.academy@trading-academy.test',
            'email_verified_at' => time(),
            'password' => Hash::make('123456'),
            'phone' => '237655588688'
        ]);

        User::create([
            'role_id' => 1,
            'ref' => User::ref(),
            'sponsor' => User::find(1)->ref,
            'is_active' => 1,
            'first_name' => 'Demo',
            'last_name' => 'Author',
            'email' => 'demo.author@trading-academy.test',
            'email_verified_at' => time(),
            'password' => Hash::make('123456'),
            'phone' => '237655588688'
        ]);

        User::create([
            'role_id' => 2,
            'ref' => User::ref(),
            'sponsor' => User::find(1)->ref,
            'is_active' => 1,
            'first_name' => 'Global Investment Trading',
            'last_name' => 'Academy',
            'email' => 'demo.teacher@trading-academy.test',
            'email_verified_at' => time(),
            'password' => Hash::make('123456'),
            'phone' => '237655588688'
        ]);

        User::create([
            'role_id' => 3,
            'ref' => User::ref(),
            'sponsor' => User::find(1)->ref,
            'is_active' => 1,
            'first_name' => 'Demo',
            'last_name' => 'Student',
            'email' => 'demo.student@trading-academy.test',
            'email_verified_at' => time(),
            'password' => Hash::make('123456'),
            'phone' => '237655588688',
            'balance' => 500
        ]);

        User::create([
            'role_id' => 1,
            'ref' => User::ref(),
            'sponsor' => User::find(1)->ref,
            'is_active' => 1,
            'is_verified' => 1,
            'first_name' => 'Boris Marvin',
            'last_name' => 'Ndouma',
            'email' => 'jaris.ultio.21@gmail.com',
            'email_verified_at' => time(),
            'password' => Hash::make('Marvinboris@21'),
            'phone' => '237655588688',
            'balance' => 500
        ]);
    }
}
