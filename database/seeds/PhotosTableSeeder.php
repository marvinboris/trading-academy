<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $photos = [
            '11-6.jpg', 
            '104098929_w640_h640_prodam-too-2007.jpg', 
            'forex-brokers.jpg', 
            '1267555.jpg',
            'fe8f1bdc611e274d3981d0b7b4e2fc6b.jpg',
            'mycryptowallet-696x456.png',
            'shutterstock_1128653108-e1565938016868.jpg',
        ];

        foreach ($photos as $photo) {
            Photo::create(['path' => $photo]);
        }
    }
}
