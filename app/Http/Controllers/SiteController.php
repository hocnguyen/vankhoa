<?php

namespace App\Http\Controllers;

use App\User;
use App\Years;
use Session;
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
            'username' =>'required|min:6|max:255',
            'password' => 'required|min:6|max:255',
            'passwordpharse' => 'required|min:6|max:255',
        ];
        $messages = [
            'username.required' => 'Username is required!',
            'username.min' => 'Username must be at least 6 characters!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 6 characters!',
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
                            DB::table('histories_login')->insert(
                                array(
                                    'user_id' => Auth::user()->id,
                                    'time_login' => date('Y-m-d H:m:s')
                                )
                            );
                            session()->put('role', $user[0]->role);
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
    
    public function hocBaVanKhoa(){
        $years = DB::table('years')->get();
        return view('site.endyear',['years' => $years]);
    }
    
    public function getHistory( Request $request){
        $cur_year = $this->getYear();
        if ($cur_year == $request->year) {
            $request->session()->flash('msg', 'Bạn đang xem học bạ niên khoá '.$cur_year.'. Vui lòng chọn niên khoá khác. ');
          return redirect("/hoc-ba-van-khoa");
        }
        Session::set("year",$request->year);
        return redirect('/');
    } 
    public function confirmEndYear(){
        return view('site.confirm');
    }

    public function endOfYear(Request $request){
        if( Auth::attempt(['password' => $request->password])) {
            $sql = "CREATE TABLE students_".$this->getYear()." LIKE students";
            DB::statement($sql);
            $year  = new Years();
            $year->year = $this->getYear();
            $year->save();
            $request->session()->flash('msg', 'End Of Year Success! ');
            return redirect("/hoc-ba-van-khoa");
        } else {
            $request->session()->flash('msg', 'Mật khẩu xác nhận End Of Year Không đúng. Vui lòng kiểm tra lại!');
            return redirect("/hoc-ba-van-khoa");
        }
    }
    
    public function backCurrent(){
        Session::forget('year');
        return redirect('/');
    }
    
}