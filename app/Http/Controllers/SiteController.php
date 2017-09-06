<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\DB;

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
        // validate the user-entered Captcha code when the form is submitted
        $code = $request->input('CaptchaCode');
        $isHuman = captcha_validate($code);
        if ($isHuman) {
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $email          = $request->input('username');
                $password       = $request->input('password');
                $passwordpharse = $request->input('passwordpharse');

                if( Auth::attempt(['username' => $email, 'password' => $password, 'passwordpharse' => $passwordpharse])) {
                    $user = DB::table('users')->where([
                        ['passwordpharse', '=', trim($passwordpharse)],
                        ['id', '=', Auth::user()->id]
                    ])->get();
                    if(count($user) > 0) {
                        $user = DB::table('users')->where([
                            ['id', '=', Auth::user()->id],
                            ['is_active', '=', User::STATUS_ACTIVE],
                        ])->get();
                        if(count($user) > 0) {
                            return redirect()->intended('/');
                        }else{
                            $errors = new MessageBag(['errorlogin' => 'This user is inactive.']);
                            return redirect()->back()->withInput()->withErrors($errors);
                        }
                    }else{
                        $errors = new MessageBag(['errorlogin' => 'Password pharse is incorrect!']);
                        return redirect()->back()->withInput()->withErrors($errors);
                    }
                } else {
                    $errors = new MessageBag(['errorlogin' => 'Username, password is incorrect!']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
        } else {
            $errors = new MessageBag(['errorlogin' => 'Captcha validation failed!']);
            return redirect()->back()->withInput()->withErrors($errors);
        }

    }
}