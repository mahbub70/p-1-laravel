<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoController extends Controller
{
    public function getDistrictsOnDivision(Request $request) {
        dd($request->all());
    }
}
