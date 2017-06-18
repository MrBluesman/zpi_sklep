<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PozycjeZamowienia extends Model
{
    protected $fillable = ['ilosc','czy_fizyczna'];
    protected $table = 'pozycje_zamowienia';
    protected $primaryKey = 'pozycjazamowieniaId';
    public $timestamps = false;

    public function zamowienie()
    {
        return $this->hasOne('App\Zamowienie','zamowienie_id', 'zamowienieId');
    }

    public function album()
    {
        return $this->hasOne('App\Album', 'plyta_id', 'plytaId');
    }





}
