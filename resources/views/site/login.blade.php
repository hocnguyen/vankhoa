@extends('layouts.main-login')
@section('title','Login Page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <br><br><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    @if($errors->has('errorlogin'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{$errors->first('errorlogin')}}
                        </div>
                    @endif
                    <form role="form" action="{{ url('/login') }}" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="User Name" name="username" type="username" autofocus="">
                                @if($errors->has('username'))
                                    <p style="color:red">{{$errors->first('username')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                @if($errors->has('password'))
                                    <p style="color:red">{{$errors->first('password')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password Pharse" name="passwordpharse" type="password" value="">
                                @if($errors->has('passwordpharse'))
                                    <p style="color:red">{{$errors->first('passwordpharse')}}</p>
                                @endif
                            </div>
                            {{ csrf_field() }}
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection