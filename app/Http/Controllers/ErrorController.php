<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ErrorController extends Controller
{
    public function index(){
        return view('errors.404');
    }

    public function render($request, Exception $e)
    {
        return redirect("/error");
    }
}
