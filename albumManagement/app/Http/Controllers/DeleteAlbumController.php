<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class DeleteAlbumController extends Controller
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

            $deleteRes = Album::where([
                'id' => $request->album_id
            ])->delete();

            if (null !== $deleteRes) {

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
