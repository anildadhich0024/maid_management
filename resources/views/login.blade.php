@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>Login</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            <form class="user-form" action="{{route('login.user')}}" method="POST" id="general_form">
                @csrf
                @if(Session::has('Failed'))
                  <div class="alert alert-danger" role="alert">
                    <strong>Failed ! </strong> {{Session::get('Failed')}}
                  </div>
                @endif
                @if(Session::has('Success'))
                  <div class="alert alert-success" role="alert">
                    <strong>Success ! </strong> {{Session::get('Success')}}
                  </div>
                @endif
                <h3 class="para-family heading-bottom text-center">We're glad to see you!</h3>
                <small class="text-center">Don't have an account? <a href="{{route('register')}}">Sign Up!</a></small><br><br>
                <div class="form-group">
                  <input type="text" class="form-control basic @error('email_address') is-invalid @enderror" maxlength="50" name="email_address" value="{{old('email_address')}}" placeholder="Email Address" required>
                  @error('email_address') <div class="invalid-feedback"><span>{{$errors->first('email_address')}}</span></div>@enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control basic @error('login_password') is-invalid @enderror" maxlength="16" name="login_password" placeholder="Password" required>
                  @error('login_password') <div class="invalid-feedback"><span>{{$errors->first('login_password')}}</span></div>@enderror
                </div>
                <!-- <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <div class="text-center">
                    <button type="submit" class="btn red-btn">Submit</button><br><br>
                    <a href="{{route('forget.password')}}">Forgot Password ?</a>
                </div>
              </form>
        </div>
    </div>
@endsection
