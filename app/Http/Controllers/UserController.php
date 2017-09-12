<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getProfile(){
        return view('user.profile');
    }
    public function postProfile(Request $request) {

    }

    public function getSettings(){
        return view('user.settings');
    }
    public function postSettings(Request $request) {

    }

    public function getCreate(){
        $model = new User();
        return view('user.form', ['model' => $model]);
    }

    public function index(){
        $users = User::where('id', '>', 0)->paginate(10);
        return view('user.index', ['users' => $users]);
    }
    public function postCreate(Request $request){
        $model = new User();

        $this->validate($request, $model->rules);

        $model->username = $request->username;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->passwordpharse = $request->passwordpharse;
        $model->firstname = $request->firstname;
        $model->lastname = $request->lastname;
        $model->phone = $request->phone;
        $model->branch = $request->branch;
        $model->role = $request->role;
        $model->is_active = $request->is_active;
        $model->remember_token = rand(1000000, 100000000000);
        if ($model->save()) {
            return redirect("/users");
        }
    }

    public function getUpdate($id){
        $model = User::find($id);
        return view('user.form', ['model' => $model]);
    }

    public function postUpdate(Request $request, $id){
        $model = User::find($id);
        $rule = $model->rules;
        unset($rule['password']);
        unset($rule['passwordpharse']);
        $rule['username'] = $rule['username'] . ',id,' . $id;
        $rule['email'] = $rule['email'] . ',id,' . $id;
        $this->validate($request, $rule);

        $model->username = $request->username;
        $model->email = $request->email;
        $model->firstname = $request->firstname;
        $model->lastname = $request->lastname;
        $model->phone = $request->phone;
        $model->branch = $request->branch;
        $model->role = $request->role;
        $model->is_active = $request->is_active;
        $model->remember_token = rand(1000000, 100000000000);
        if ($model->update()) {
            return redirect("/users");
        }
    }

    public function getChangePass($id){
        $model = User::find($id);
        return view('user.changepass', ['model' => $model]);
    }

    public function postChangePass(Request $request, $id){
        $model = User::find($id);
        $rules = [
            'current_password' => 'required',
            'password' => 'required|min:6|max:255|same:password',
            'password_confirmation' => 'required|min:6|max:255|same:password',
        ];
        $hashedPassword = $model->password;
        if (Hash::check($request->current_password, $hashedPassword)) {
            $this->validate($request, $rules);
            $model->password =  bcrypt($request->password);
            if ($model->update()) {
                return redirect("/users");
            }
        }else{
            $errors = new MessageBag(['errorchangepass' => "Old password doesn't mactch!"]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function View($id){
        $model = User::find($id);
        return view('user.view', ['model' => $model]);
    }

    public function getChangePassPharse($id){
        $model = User::find($id);
        return view('user.changepasspharse', ['model' => $model]);
    }

    public function postChangePassPharse(Request $request, $id){
        $model = User::find($id);
        $rules = [
            'current_passwordpharse' => 'required',
            'passwordpharse' => 'required|min:6|max:255|same:passwordpharse',
            'passwordpharse_confirmation' => 'required|min:6|max:255|same:passwordpharse',
        ];
        $hashedPassword = $model->passwordpharse;
        if ($request->current_passwordpharse == $hashedPassword) {
            $this->validate($request, $rules);
            $model->passwordpharse =  $request->passwordpharse;
            if ($model->update()) {
                return redirect("/users");
            }
        }else{
            $errors = new MessageBag(['errorchangepass' => "Old password pharse doesn't mactch!"]);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
