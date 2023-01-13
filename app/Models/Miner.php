<?php

namespace App\Models;

use App\Models\Gpu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Miner extends Model
{
    use HasFactory;

    public int $budget;
    public int $provision;
    public int $hashrateMin = 0;
    public int $hashrateMax = 0;
    public int $powerMin = 0;
    public int $powerMax = 0;
    public int $provision_real = 0;
    public int $miner_cost = 0;
    public int $gpu = 0;
    public int $gpu_amount = 0;
    public int $miners_amount = 0;
    public int $miners_base_cost = 0;
    public int $psu_amount = 0;
    public int $psu_power = 0;
}
