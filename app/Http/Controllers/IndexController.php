<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

class IndexController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        return view('index.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->intended('/login');
    }
}