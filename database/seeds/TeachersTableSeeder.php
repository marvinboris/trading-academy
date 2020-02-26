<?php

use App\Teacher;
use App\User;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teachers = User::where('role_id', 2)->get();
        foreach ($teachers as $teacher) {
            Teacher::create([
                'user_id' => $teacher->id
            ]);
        }
    }
}
