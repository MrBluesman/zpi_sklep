<?php

namespace App;

use App\Artist;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = ['tytul', 'rok', 'data_wydania', 'cena_fizyczna', 'cena_cyfrowa', 'dostepnosc'];
  protected $table = 'plyta';
  protected $primaryKey = 'id';
  public $timestamps = false;

  public function artist()
  {
    return $this->belongsTo('App\Artist', 'album_id', 'artysta_id');
  }
}