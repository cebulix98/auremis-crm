<?php

namespace App\Http\Controllers;

use App\Models\Gpu;
use Illuminate\Http\Request;

class GpuController extends Controller
{
    
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'hashrateMin' => 'required',
            'hashrateMax' => 'required',
            'powerMin' => 'required',
            'powerMax' => 'required',
            'price' => 'required'
        ]);

        $gpu = Gpu::create($formFields);
    }

    public function getFilteredGpus(Request $request)
    {
        $query = Gpu::query();

        if(isset($request->name)) $query->where('name', 'LIKE', "%{$request->name}%");

        if(isset($request->priceMin) && isset($request->priceMax)) $query->whereBetween('price', [$request->priceMin, $request->priceMax]);
        elseif(isset($request->priceMin)) $query->where('price', '>', $request->priceMin);
        elseif(isset($request->priceMax)) $query->where('price', '<', $request->priceMax);
        
        if(isset($request->hashrateMin) && isset($request->hashrateMax)) $query->whereBetween('hashrateMin', [$request->hashrateMin, $request->hashrateMax]);
        elseif(isset($request->hashrateMin)) $query->where('hashrateMin', '>', $request->hashrateMin);
        elseif(isset($request->hashrateMax)) $query->where('hashrateMin', '<', $request->hashrateMax);

        return $query->get()->toJson();
    }

}
