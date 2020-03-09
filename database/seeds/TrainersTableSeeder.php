<?php

use App\Trainer;
use Illuminate\Database\Seeder;

class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Trainer::create([
            'img' => '/images/11-6.jpg',
            'name' => 'SIMB Emile Parfait',
            'resume' => 'CEO, Crypto trader, and founder of Global Investment Trading',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'whatsapp' => '#'
            ])
        ]);

        Trainer::create([
            'img' => '/images/800x590-curtis-jackson-1920x1080.jpg',
            'name' => 'YUNGONG Briand',
            'resume' => 'Head of IT Department of Global Investment Trading',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'whatsapp' => '#'
            ])
        ]);

        Trainer::create([
            'img' => '/images/Michael-Jordans-Short-Haircut-1-1.jpg',
            'name' => 'PANGSOU Innocent',
            'resume' => 'Head of Trading Department of Global Investment Trading',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'whatsapp' => '#'
            ])
        ]);

        Trainer::create([
            'img' => '/images/Folarin_photo_credit_Valerie_Woody.5d3b2983c9977.jpg',
            'name' => 'KOUMBOU Jeffe',
            'resume' => 'General Director of Global Investment Trading',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'whatsapp' => '#'
            ])
        ]);

        Trainer::create([
            'img' => '/images/e68111de892892fc25b3e72c1ee6a4f6.jpg',
            'name' => 'MEFIRE Souleymane',
            'resume' => 'Head of Logistics Department of Global Investment Trading',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'whatsapp' => '#'
            ])
        ]);
    }
}
