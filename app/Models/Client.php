<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'name',
        'last_name'
    ];

    protected int $id; 
    protected String $email;
    protected String $phone;
    protected String $name;
    protected String $last_name;
}
