<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'is_active' => 1,
            'name' => 'Admin',
            'email' => 'admin@trading-academy.test',
            'password' => Hash::make('adminadmin'),
            'phone' => '237655588688'
        ]);
        
        Admin::create([
            'is_active' => 1,
            'name' => 'Admin',
            'email' => 'jaris.ultio.21@gmail.com',
            'password' => Hash::make('12345'),
            'phone' => '237655588688'
        ]);
    }
}
