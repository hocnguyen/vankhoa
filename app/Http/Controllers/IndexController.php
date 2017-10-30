<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Illuminate\Routing\Route;

class IndexController extends Controller
{

    public function index(){
        return view('index.index', ["student" => $this->studentTable]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/login');
    }
}