<?php

namespace App\Http\Controllers\Website\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function showRegistrationForm() {
        $title = "Register";

        return view('website.auth.register',[
            'title'         => $title,
            'geo_divisions' => get_geo_divisions(),
        ]);

    }


    /**
     * Handle a registration request and store it in temp data.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function registerRequest(Request $request)
    {
        // dd($request->all());
    }


    public function register(Request $request)
    {
        dd($request->all());
    }


}
