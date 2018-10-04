<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Album;

class AddReviewController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['ordinary']);

        try {

            $review = new Review();
            $review->user_id = $request->user()->id;
            $review->album_id = $request->album_id;
            $review->review_text = $request->review_text;

            if ($review->save()) {

                $album = new Album();
                $albums = $album->getAlbums();

                $reviews = $review::all();

                return view('home', ['albums' => $albums, 'reviews' => $reviews]);
            }

        } catch (\Exception $e) {

            logger($e->getMessage());

            return view('home');
        }
    }
}
