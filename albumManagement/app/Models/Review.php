<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function users() {
        return $this->hasMany(User::class);
    }

    public function albums() {
        return $this->hasMany(Album::class);
    }
}
