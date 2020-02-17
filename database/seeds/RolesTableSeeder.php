<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'name' => 'Author'
        ]);
        
        Role::create([
            'name' => 'Teacher'
        ]);
        
        Role::create([
            'name' => 'Student'
        ]);
    }
}
