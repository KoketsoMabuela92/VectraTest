<?php

namespace App\Http\Controllers;

use http\Exception;
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

        $albums = $this->getAlbums();

        if ($request->user()->roles[0]['name'] === 'admin') {

            return view('admin_home', ['albums' => $albums]);
        }

        return view('home');

    }

    private function getAlbums () {

        try {

        $albums = Album::all();

        if (null !== $albums) {

        return $albums;

        } } catch (\Exception $e) {
            Log::error($e->getMessage());

            return [];
        }
    }
}
