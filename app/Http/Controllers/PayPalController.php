<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayPalController extends Controller
{
    public function returnPaypal(Request $request)
    {
        dd($request->all());
    }
}
