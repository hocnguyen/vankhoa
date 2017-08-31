<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class SiteController extends Controller
{
    public function getLogin(){
        return view('site.login');
    }

    public function postLogin(Request $request) {
        $rules = [
            'username' =>'required|min:6',
            'password' => 'required|min:8',
            'passwordpharse' => 'required|min:6',
        ];
        $messages = [
            'username.required' => 'Username is required!',
            'username.min' => 'Username must be at least 6 characters!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 8 characters!',
            'passwordpharse.required' => 'Password pharse is required!',
            'passwordpharse.min' => 'Password pharse must be at least 6 characters!',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email          = $request->input('username');
            $password       = $request->input('password');
            $passwordpharse = $request->input('passwordpharse');

            if( Auth::attempt(['username' => $email, 'password' => $password, 'passwordpharse' => $passwordpharse])) {
                return redirect()->intended('/');
            } else {
                $errors = new MessageBag(['errorlogin' => 'Username, password or Password pharse is incorrect!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
}