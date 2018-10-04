<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class EditAlbumController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        try {

            $updateRes = Album::where([
                'id' => $request->album_id
            ])->update([
                'album_name' => $request->album_name,
                'album_artist' => $request->album_artist,
                'album_price' => $request->album_price,
            ]);

            if (null !== $updateRes) {

                $album = new Album();
                $albums = $album->getAlbums();

                return view('admin_home', ['albums' => $albums]);
            }

        } catch (\Exception $e) {

            logger($e->getMessage());

            return view('home');
        }
    }
}
