@extends('layouts.app')
@section('content')
    <div class="common-banner" style="background-image: url(images/banner-img-2.png);">
         <h1>Contact Us</h1>
    </div>
    <div class="section feedback">
        <div class="container">
              <div class="row">
                  <div class="col-md-6 anchor-list">
                      <h3 class="para-family heading-bottom">Our Email & Website:</h3>
                      <a href="#" class="img-abs"><img src="images/email.svg" alt=""> Email : mmsdatas@gmail.com</a>
                      <a href="#" class="img-abs"><img src="images/Website.svg" alt=""> Website : www.maidms.com.sg</a>

                      <h3 class="para-family heading-bottom mt-3">Operating Hours:</h3>
                      <p class="img-abs"><img src="images/clock-1.svg" alt="">Monday to Friday : 10:30 am to 7:00 pm<br>
                        Saturday to Sunday: 10:30 am to 5:00 pm</p>
                  </div>
                  <div class="col-md-6 feed-back-form col-padding-left">
                    <h3 class="para-family heading-bottom">Feedback Form:</h3>
                    <form action="{{route('feedback')}}" method="POST" id="general_form">
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
                        <div class="mb-3">
                            <input type="text" class="form-control basic @error('full_name') is-invalid @enderror" maxlength="32" name="full_name" value="{{old('full_name')}}" placeholder="Name" onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                            @error('full_name') <div class="invalid-feedback"><span>{{$errors->first('full_name')}}</span></div>@enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control basic @error('email_address') is-invalid @enderror" maxlength="50" name="email_address" value="{{old('email_address')}}" placeholder="Email Address" required>
                            @error('email_address') <div class="invalid-feedback"><span>{{$errors->first('email_address')}}</span></div>@enderror
                        </div>
                        <div class="mb-3">
                            <input type="text" maxlength="10" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" placeholder="Mobile Number" onkeypress="return IsNumber(event, this.value, '10')" required>
                            @error('mobile_number') <div class="invalid-feedback"><span>{{$errors->first('mobile_number')}}</span></div>@enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="message" rows="5" class="form-control @error('message') is-invalid @enderror" maxlength="150" placeholder="Message" cols="" required>{{old('message')}}</textarea>
                            @error('message') <div class="invalid-feedback"><span>{{$errors->first('message')}}</span></div>@enderror
                        </div>
                        <button type="submit" class="btn red-btn">Submit</button>
                      </form>
                </div>
              </div>
        </div>
    </div>
    <div class="section map-list section-padding">
        <div class="container">
            <div class="row">
                @foreach($address_list as $rec)
                    <div class="col-md-6 map-box">
                        <h3 class="para-family">{{$rec->address_title}}:</h3>
                        <p>{{$rec->full_address}}</br>
                            Tel: {{$rec->phone_number}}</p>
                            <iframe src="{{$rec->iframe_url}}" style="border:0; height: 320px; width: 100%;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
