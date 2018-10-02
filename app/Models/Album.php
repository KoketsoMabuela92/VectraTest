<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function getAlbums () {

        try {

            $albums = Album::all();

            if (null !== $albums) {

                return $albums;
            }

        } catch (\Exception $e) {

            logger($e->getMessage());

            return [];
        }
    }
}
