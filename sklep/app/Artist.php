<?php

namespace App;

use App\Album;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['nazwa','opis'];
    protected $table = 'artysta';
    protected $primaryKey = 'artysta_id';
    public $timestamps = false;

    public function album()
    {
        return $this->hasMany('App\Album', 'plyta_id', 'artysta_id');
    }


}
