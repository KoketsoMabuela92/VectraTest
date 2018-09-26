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
    }
}
