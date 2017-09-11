<?php

namespace App\Http\Controllers;

use App\HistoriesLogin;
use Illuminate\Http\Request;

use App\Http\Requests;

class HistoriesLoginController extends Controller
{
    public function index(){
        $histories = HistoriesLogin::with('user')->orderBy('time_login', 'DESC')->paginate(10);
        return view('historiesLogin.index', ['histories' => $histories]);
    }
}
