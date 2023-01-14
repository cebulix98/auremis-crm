<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','hashrateMin', 'hashrateMax', 'powerMin', 'powerMax', 'price'
    ];

    protected $name;
    protected $hashrateMin;
    protected $hashrateMax;
    protected $powerMin;
    protected $powerMax;
    protected $price;

}
