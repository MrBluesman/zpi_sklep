<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'Osoba';
    protected $primaryKey = 'osoba_id';
    public $timestamps = false;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adresId', 'typ_kontaId', 'imie', 'nazwisko', 'pesel', 'email', 'nr_telefonu', 'name', 'password', 'zbanowany'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function typKonta()
    {
      return $this->belongsTo('App\AccountType', 'typ_kontaId');
    }

    // public function address()
    // {
    //   return $this->hasOne('App\ShippingAddress', 'adres_id', 'adresId');
    // }
}
