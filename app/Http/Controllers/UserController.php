<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        $model->is_admin = $request->is_admin;
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
        $model->is_admin = $request->is_admin;
        $model->is_active = $request->is_active;
        $model->remember_token = rand(1000000, 100000000000);
        if ($model->update()) {
            return redirect("/users");
        }
    }
}
