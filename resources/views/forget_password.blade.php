@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>Forgot Password</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
              <form class="user-form" action="{{ route('forget.password.post') }}" method="POST" id="general_form">
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
                <h3 class="para-family heading-bottom text-center">Forgot Password</h3>
                <div class="form-group">
                  <input type="text" class="form-control basic @error('email_address') is-invalid @enderror" maxlength="50" name="email_address" value="{{old('email_address')}}" placeholder="Email Address">
                  @error('email_address') <div class="invalid-feedback"><span>{{$errors->first('email_address')}}</span></div>@enderror
                </div>
                <div class="text-center">
                    <button type="submit" class="btn red-btn">Send Email</button><br>
                    <a href="{{route('login')}}">Login Again</a>
                </div>
              </form>
        </div>
    </div>
@endsection
