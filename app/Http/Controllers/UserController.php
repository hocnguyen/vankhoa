<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function getProfile(){
        return view('user.profile');
    }
    public function postProfile(Request $request) {}

    public function getSettings(){
        return view('user.settings');
    }
    public function postSettings(Request $request) {

    }

}
