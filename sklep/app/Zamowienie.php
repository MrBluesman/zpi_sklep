<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zamowienie extends Model
{
    protected $fillable = ['cena','metoda_platnosci','data_zamowienia','znizka'];
    protected $table = 'zamowienie';
    protected $primaryKey = 'zamowienie_id';
    public $timestamps = true;

    public function user()
    {
        return $this->hasOne('App\User', 'osoba_id', 'klientId');
    }

    public function status()
    {
        return $this->hasOne('App\Status', 'statusy_id', 'statusId');
    }

    public function pozycjeZamowienia()
    {
        return $this->hasMany('App\PozycjeZamowienia');
    }

    public function adres()
    {
        return $this->hasMany('App\Adres');
    }

}
