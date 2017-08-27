<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function login(){
        return view('site.login');
    }
}