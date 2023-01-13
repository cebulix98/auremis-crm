<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ClientController extends BaseController
{

    public function add(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'phone' => 'required',
            'name' => 'required',
            'last_name' => 'required'
        ]);

        Client::create($formFields);

        return redirect()->route('/client/list')->with('message', 'CLIENT_CREATED');

    }
}
