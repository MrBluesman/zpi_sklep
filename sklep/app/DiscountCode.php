<?php

namespace App;

use App\DiscountCode;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $table = 'kod_rabatowy';
    protected $primaryKey = 'kod_rabatowy_id';
    public $timestamps = false;
    protected $fillable = [
        'tresc','znizka'
    ];
}
