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

        return redirect('/gpu/list')->with('message', 'Karta graficzna została dodana');
    }

}
