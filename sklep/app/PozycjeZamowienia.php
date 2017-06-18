<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PozycjeZamowienia extends Model
{
    protected $fillable = ['data_zamowienia','czy_fizyczna'];
    protected $table = 'pozycje_zamowienia';
    protected $primaryKey = array('zamowienieId', 'plytaId');
    public $timestamps = false;

}
