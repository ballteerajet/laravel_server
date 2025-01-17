<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsrfTokenController extends Controller
{
    public function getToken(Request $request)
    {
        return response()->json(['csrf_token' => csrf_token()]);
    }
}