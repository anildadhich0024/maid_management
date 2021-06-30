@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url(images/banner-img-2.png);">
         <h1>Create Account</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            <form class="user-form" style="max-width: 700px;" method="POST" action="{{route('register.customer')}}" id="general_form">
                @csrf
                @if(Session::has('Failed'))
                  <div class="alert alert-danger" role="alert">
                    <strong>Failed ! </strong> {{Session::get('Failed')}}
                  </div>
                @endif
                <h3 class="para-family heading-bottom text-center">Create an user account</h3>
                <small>The Email address when you registered is your username, if you have already registered account of MaidMS, Please Click here to <a href="{{route('login')}}">log in</a></small><br><br>
                <div class="form-group">
                    <input type="text" class="form-control basic @error('user_name') is-invalid @enderror" maxlength="32" name="user_name" value="{{ old('user_name')}}" placeholder="Full Name" onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                    @error('user_name') <div class="invalid-feedback"><span>{{$errors->first('user_name')}}</span></div>@enderror
                </div>
                <div class="form-group">
                  <input type="email" class="form-control basic @error('email_address') is-invalid @enderror" maxlength="50" name="email_address" value="{{ old('email_address')}}" placeholder="Email Address" required>
                  @error('email_address') <div class="invalid-feedback"><span>{{$errors->first('email_address')}}</span></div>@enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control basic @error('password') is-invalid @enderror" maxlength="16" name="password" value="{{ old('password')}}" placeholder="Password" required>
                  @error('password') <div class="invalid-feedback"><span>{{$errors->first('password')}}</span></div>@enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control basic @error('user_name') is-invalid @enderror" maxlength="16" name="confirm_password" value="{{ old('confirm_password')}}" placeholder="Confirm Password" required>
                    @error('confirm_password') <div class="invalid-feedback"><span>{{$errors->first('confirm_password')}}</span></div>@enderror
                  </div>
              
                <div class="text-center">
                    <p style="font-size: 14px; line-height: 20px; font-weight: 500;">Your privacy is important to us. By submitting this form, you consent that our website and associated companies, may collect, use or disclosed your basic contact info for purpose in connection with the services provided by us. Please view our Privacy Policy.  </p>
                    <button type="submit" class="btn red-btn">Submit</button>
                </div>
              </form>
        </div>
    </div>
@endsection