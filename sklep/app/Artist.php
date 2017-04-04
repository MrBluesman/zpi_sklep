<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['nazwa','opis'];
    protected $table = 'artysta';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
