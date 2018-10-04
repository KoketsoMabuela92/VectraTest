<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Album;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['admin', 'ordinary']);

        $album = new Album();
        $albums = $album->getAlbums();

        if ($request->user()->roles[0]['name'] === 'admin') {

            return view('admin_home', ['albums' => $albums]);
        }

        $review = new Review();
        $reviews = $review::all();

        return view('home', ['albums' => $albums, 'reviews' => $reviews]);
    }
}
