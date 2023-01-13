<?php

namespace App\Http\Controllers;

use App\Models\Gpu;
use App\Models\Miner;
use App\Services\MinerService;
use Illuminate\Http\Request;

class MinerController extends Controller
{

    static private $parts_cost = 3000;
    private MinerService $minerService;

    public function __construct(MinerService $minerService) 
    {
        $this->minerService = $minerService;
    }



    public function build(Request $request)
    {
        $formFields = $request->validate([
            'budget' => 'required',
            'provision' => 'required',
            'name' => 'required',
            'gpu' => 'required',
        ]);

        return json_encode($this->buildMiner($formFields['budget'], $formFields['provision'], $formFields['name'], $formFields['gpu'], SELF::$parts_cost));
    }

    
}