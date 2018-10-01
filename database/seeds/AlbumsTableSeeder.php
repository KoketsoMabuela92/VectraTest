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
        $albumObject->album_name = 'Album 1';
        $albumObject->album_artist = 'Artist 1';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album1.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Album 2';
        $albumObject->album_artist = 'Artist 2';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album2.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Album 3';
        $albumObject->album_artist = 'Artist 3';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album3.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Album 4';
        $albumObject->album_artist = 'Artist 4';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album4.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Album 5';
        $albumObject->album_artist = 'Artist 5';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album5.jpg';
        $albumObject->save();

        $albumObject = new Album();
        $albumObject->user_id = 1;
        $albumObject->album_name = 'Album 6';
        $albumObject->album_artist = 'Artist 6';
        $albumObject->album_price = 79.90;
        $albumObject->album_cover_path = '../storage/app/public/album6.jpg';
        $albumObject->save();
    }
}
