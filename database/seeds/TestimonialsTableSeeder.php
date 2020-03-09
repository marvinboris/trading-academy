<?php

use App\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Testimonial::create([
            'name' => 'John Doe',
            'img' => '/images/11-6.jpg',
            'title' => 'Proprietary of Shane Branding LTD',
            'postTitle' => 'The Best Crypto Trading Academy school',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'instagram' => '#',
                'skype' => '#'
            ]),
            'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
        ]);

        Testimonial::create([
            'name' => 'Alvino Jaris',
            'img' => '/images/Michael-Jordans-Short-Haircut-1-1.jpg',
            'title' => 'CEO of Alvino & Sons SARL',
            'postTitle' => 'The Best Crypto Trading Academy school',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'instagram' => '#',
                'skype' => '#'
            ]),
            'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
        ]);

        Testimonial::create([
            'name' => 'Calvin Baristo',
            'img' => '/images/800x590-curtis-jackson-1920x1080.jpg',
            'title' => 'Crypto Investor',
            'postTitle' => 'The Best Crypto Trading Academy school',
            'links' => json_encode([
                'facebook' => '#',
                'twitter' => '#',
                'linkedin' => '#',
                'instagram' => '#',
                'skype' => '#'
            ]),
            'text' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no'
        ]);
    }
}
