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

    public $name;
    public $hashrateMin;
    public $hashrateMax;
    public $powerMin;
    public $powerMax;
    public $price;

}
