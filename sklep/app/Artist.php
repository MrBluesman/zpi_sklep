<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['nazwa','opis'];
    protected $table = 'artysta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function album()
    {
        return $this->hasMany('App\Album', 'album_id', 'artysta_id');
    }
}
