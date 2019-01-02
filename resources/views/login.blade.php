@extends('layouts.app')
@section('title','Login')
@section('content')
	<section class="login-wrap">
        <div class="container">
          <div class="direction"><a href="#"><span>Home</span></a><span class="angle_right"><i class="fas fa-angle-right"></i></span><a class="active" href="#"><span>Login</span></a></div>
          <div class="form-login">
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-10">
                <form id="form_login" action="{{route('post.login')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <h1>Login</h1>
                  @if(session()->has('fail'))
                    <br><span class="text-danger" style="font-size: 12px;">
                        {{ session('fail') }}
                    </span>
                        {{session()->forget('fail')}}
                  @endif
                  <div class="form-login--item"><i class="fas fa-user"></i>
                    <input id="full_name" type="text" name="username" placeholder="USERNAME"/>
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <br><span class="text-danger" style="font-size: 9px;">{{$errors->first('username')}}</span>
                      @endif
                    @endif
                  </div>
                  <div class="form-login--item"><i class="fas fa-lock"></i>
                    <input id="password" type="password" name="password" placeholder="PASSWORD"/>
                    @if(sizeof($errors) != 0)
                      @if($errors)
                        <br><span class="text-danger" style="font-size: 9px;">{{$errors->first('password')}}</span>
                        <br>
                      @endif
                    @endif
                  </div>
                  <label for="remember"> 
                    <input type="checkbox" name="remember" />Remember Me
                  </label>
                  <div class="site-btn"> 
                    <input class="btn btn-primary btn-base" type="submit" value="Login"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection