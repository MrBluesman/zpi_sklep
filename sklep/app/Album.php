<?php

namespace App;

use App\Artist;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
  protected $fillable = ['tytul', 'rok', 'data_wydania', 'cena_fizyczna', 'cena_cyfrowa', 'dostepnosc'];
  protected $table = 'plyta';
  protected $primaryKey = 'plyta_id';
  public $timestamps = false;

    public function artist()
    {
        return $this->belongsTo('App\Artist', 'artystaId' );
    }

    public function type()
    {
        return $this->hasOne('App\Type', 'gatunek_Id' , 'gatunekId');
    }

}
