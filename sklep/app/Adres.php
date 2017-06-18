<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adres extends Model
{
    protected $fillable = ['kod_pocztowy','miasto','ulica','nr_domu','nr_mieszkania'];
    protected $table = 'adres';
    protected $primaryKey = 'adres_id';
    public $timestamps = false;


}
