<?php

namespace App\Http\Controllers;

use App\HistoriesLogin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class HistoriesLoginController extends Controller
{
    public function index(){
        $histories = HistoriesLogin::with('user')
            ->where(DB::raw("(DATE_FORMAT(time_login,'%Y'))"),$this->getYear())
            ->orderBy('time_login', 'DESC')
            ->paginate(15);
        return view('historiesLogin.index', ['histories' => $histories]);
    }
}
