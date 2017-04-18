<?php

namespace App;

use App\AccountType;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
  protected $table = 'typ_konta';
  protected $primaryKey = 'typ_konta_id';
  public $timestamps = false;

  public function users()
  {
      return $this->hasMany('App\User', 'osoba_id', 'typ_konta_id');
  }
}
