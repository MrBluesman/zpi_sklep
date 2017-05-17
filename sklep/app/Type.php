<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'gatunek';
    protected $primaryKey = 'gatunek_id';
    protected $fillable = ['nazwa'];
    public $timestamps = false;

}
