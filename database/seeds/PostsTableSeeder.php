<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Author;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Author::find(1)->posts()->save(Post::create([
            'title' => 'One for all',
            'body' => "Il s'agit bien évidemment de l'alter de Deku",
            'photo_id' => 1
        ]));
        
        Author::find(2)->posts()->save(Post::create([
            'title' => 'One for all',
            'body' => "Il s'agit bien évidemment de l'alter de Deku",
            'photo_id' => 1
        ]));
    }
}
