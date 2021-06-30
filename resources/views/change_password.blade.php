@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-md-9">
                    <div class="user-details">
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
                        <h3>Change Password</h3>
                        <form class="user-form" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="password" class="form-control basic @error('login_password') is-invalid @enderror" maxlength="16" name="login_password" placeholder="Old Password" required>
                                @error('login_password') <div class="invalid-feedback"><span>{{$errors->first('login_password')}}</span></div>@enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control basic @error('new_password') is-invalid @enderror" maxlength="16" name="new_password" placeholder="New Password" required>
                                @error('new_password') <div class="invalid-feedback"><span>{{$errors->first('new_password')}}</span></div>@enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control basic @error('confirm_password') is-invalid @enderror" maxlength="16" name="confirm_password" placeholder="Confirm Password" required>
                                @error('confirm_password') <div class="invalid-feedback"><span>{{$errors->first('confirm_password')}}</span></div>@enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn red-btn">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection