<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $page_title = "Profile";
        return view('user.profile.index', compact('page_title'));
    }
}
