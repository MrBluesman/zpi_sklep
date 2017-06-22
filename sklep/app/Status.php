<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['statusy'];
    protected $table = 'statusy';
    protected $primaryKey = 'statusy_id';
    public $timestamps = false;


}
