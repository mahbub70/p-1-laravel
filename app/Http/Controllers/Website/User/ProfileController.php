<?php

namespace App\Http\Controllers\Website\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $page_title = "Profile";
        $user = auth()->user();
        return view('user.profile.index', compact('page_title','user'));
    }
}
