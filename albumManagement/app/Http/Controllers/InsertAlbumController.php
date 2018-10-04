<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class InsertAlbumController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $request->user()->authorizeRoles(['admin']);
        try {

            $file = $request->file('album_cover');

            if ($file) {

                $storagePath = Storage::disk('public')->put('albums',$file);
                $path = basename($storagePath);
                $album = new Album();
                $album->user_id = $request->user()->id;
                $album->album_name = $request->album_name;
                $album->album_artist = $request->album_artist;
                $album->album_price = $request->album_price;
                $album->album_cover_path = $path;

                if($album->save()) {

                    $album = new Album();
                    $albums = $album->getAlbums();

                    return view('admin_home', ['albums' => $albums]);
                }
            }

        } catch (\Exception $e) {

            logger($e->getMessage());

            return view('home');
        }
    }
}
