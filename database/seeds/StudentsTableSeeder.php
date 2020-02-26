<?php

use App\Student;
use App\User;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $students = User::where('role_id', 3)->get();
        foreach ($students as $student) {
            Student::create([
                'user_id' => $student->id
            ]);
        }
    }
}
