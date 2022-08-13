<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show(Request $request, $id = 'noRoutValue')
    {
        $request->request->add([
            'requestVar' => 'requestVal',
            'routVar' => $id
        ]);

        dd($request->request->all());

    }
}
