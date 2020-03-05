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
            'title' => 'FIRST REAL ESTATE TOKEN BASE PROJECT FROM GLOBAL INVESTMENT TRADING',
            'body' => "Hello everyone and weicome to this concept of national verbalistic",
            'photo_id' => 5
        ]));
        
        Author::find(1)->posts()->save(Post::create([
            'title' => 'SIMBCOIN WORLD TOUR STARTED IN THE CAPITAL CITY OF CAMEROON (YDE)',
            'body' => "Hello everyone and weicome to this concept of national verbalistic",
            'photo_id' => 6
        ]));
        
        Author::find(1)->posts()->save(Post::create([
            'title' => 'GLOBAL INVESTMENT TRADING LUNCHED A NEW CRYPTO CURRENCY (SIMBCOIN)',
            'body' => "Hello everyone and weicome to this concept of national verbalistic",
            'photo_id' => 7
        ]));
    }
}
