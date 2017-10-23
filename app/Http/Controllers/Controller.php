<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Illuminate\Routing\Route;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function __construct(Route $route) {
        $action =  $route->getUri();
        $skipArr = ['login','error','logout'];
        if (!in_array($action,$skipArr)) {
            $this->middleware('auth');
        }
    }

    public static function generalID($id){
        $countNum = strlen($id);
        for ($i = $countNum; $i < 5; $i++){
            $id = "0".$id;
        }
        return $id;
    }

    public static function getYear(){
        $year = Session::get("year");
        if (empty($year)) {
            return "2017";
        }
            return $year;
    }

}
