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

        // dd(get_geo_divisions(),get_geo_districts(),get_geo_division_id_by_name("dhaka"), get_geo_districts_on_division('dhaka'), get_geo_upazilas(),get_geo_upazilas_on_district(2));

        return view('website.auth.register',[
            'title'         => $title,
            'geo_divisions' => get_geo_divisions(),
        ]);

    }





}
