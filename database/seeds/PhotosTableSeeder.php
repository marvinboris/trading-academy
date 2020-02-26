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
        $photos = ['11-6.jpg', '104098929_w640_h640_prodam-too-2007.jpg', 'forex-brokers.jpg', '1267555.jpg'];

        foreach ($photos as $photo) {
            Photo::create(['path' => $photo]);
        }
    }
}
