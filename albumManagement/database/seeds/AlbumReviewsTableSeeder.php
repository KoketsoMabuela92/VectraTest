<?php

use Illuminate\Database\Seeder;
use App\Models\Review;

class AlbumReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $reviewObject = new Review();
        $reviewObject->user_id = 1;
        $reviewObject->album_id = 1;
        $reviewObject->review_text = 'Review 1.....';
        $reviewObject->save();

        $reviewObject = new Review();
        $reviewObject->user_id = 1;
        $reviewObject->album_id = 2;
        $reviewObject->review_text = 'Review 2.....';
        $reviewObject->save();

        $reviewObject = new Review();
        $reviewObject->user_id = 1;
        $reviewObject->album_id = 2;
        $reviewObject->review_text = 'Review 3.....';
        $reviewObject->save();

        $reviewObject = new Review();
        $reviewObject->user_id = 1;
        $reviewObject->album_id = 3;
        $reviewObject->review_text = 'Review 4.....';
        $reviewObject->save();
    }
}
