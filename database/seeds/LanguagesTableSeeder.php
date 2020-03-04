<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Language::create([
            'lang' => 'en',
            'name' => 'English'
        ]);
        
        Language::create([
            'lang' => 'fr',
            'name' => 'Français'
        ]);
    }
}
