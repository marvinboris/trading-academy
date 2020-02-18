<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Author;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $authors = User::where('role_id', 1)->get();
        foreach ($authors as $author) {
            Author::create([
                'user_id' => $author->id
            ]);
        }
    }
}
