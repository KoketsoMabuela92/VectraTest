<?php

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Arise';
        $albumObject->album_artist = 'Madonna';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = 'album1.jpeg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Lately';
        $albumObject->album_artist = 'Drake';
        $albumObject->album_price = 344.90;
        $albumObject->album_cover_path = 'album2.png';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Sorry';
        $albumObject->album_artist = 'Justin B';
        $albumObject->album_price = 23.82;
        $albumObject->album_cover_path = 'album3.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Families Together';
        $albumObject->album_artist = 'James Blunt';
        $albumObject->album_price = 23.11;
        $albumObject->album_cover_path = 'album4.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Other Side';
        $albumObject->album_artist = 'Adel';
        $albumObject->album_price = 472.00;
        $albumObject->album_cover_path = 'album5.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Lady Soul';
        $albumObject->album_artist = 'Aretha F';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = 'album6.jpg';
        $albumObject->save();
    }
}
