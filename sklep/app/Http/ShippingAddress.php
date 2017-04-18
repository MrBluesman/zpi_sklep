<?php

namespace App;

use App\ShippingAddress;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'adres';
    protected $primaryKey = 'adres_id';
    public $timestamps = false;
    protected $fillable = [
        'kod_pocztowy','miasto', 'ulica', 'nr_domu', 'nr_mieszkania'
    ];


    public function osoba()
    {
      return $this->belongsTo('App\User', 'adresId');
    }
}
