<?php

namespace App\Models;

use App\Models\Gpu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Miner extends Model
{
    use HasFactory;

    protected int $budget;
    protected int $provision;
    protected int $hashrateMin = 0;
    protected int $hashrateMax = 0;
    protected int $powerMin = 0;
    protected int $powerMax = 0;
    protected int $provision_real = 0;
    protected int $miner_cost = 0;
    protected int $gpu = 0;
    protected int $gpu_amount = 0;
    protected int $miners_amount = 0;
    protected int $miners_base_cost = 0;
    protected int $psu_amount = 0;
    protected int $psu_power = 0;
}
