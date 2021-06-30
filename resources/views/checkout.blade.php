@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="user-details">
                        @if(Session::has('Failed'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Failed ! </strong> {{Session::get('Failed')}}
                            </div>
                        @endif
                        <h5 style="margin-bottom: 30px;">My selected list:</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Nationality</th>
                                    <th scope="col">Language</th>
                                    <th scope="col">Experience</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($emp_cart as $key => $rec)
                                    @php
                                        $emp_data = App\Models\Employee::with('country_data','language_data')->find($rec['emp_id']);
                                    @endphp
                                    <tr>
                                        <td><div class="user-photo" style="background-image: url({{asset('storage/employee_photo')}}/{{$emp_data->emp_photo}});"></div></td>
                                        <td>{{$emp_data->emp_code}}</td>
                                        <th><a href="{{route('helper.profile',base64_encode($emp_data->emp_id))}}">{{$emp_data->full_name}}</a></th>
                                        <td>{{$emp_data->country_data->misc_title}}</td>
                                        <td>{{$emp_data->language_data->misc_title}}</td>
                                        <td>
                                            {{$emp_data->emp_dtl_1}} {{!empty($emp_data->emp_dtl_1) && !empty($emp_data->emp_dtl_2) ? ', ' : ''}}
                                            {{$emp_data->emp_dtl_2}} {{!empty($emp_data->emp_dtl_2) && !empty($emp_data->emp_dtl_3) ? ', ' : ''}}
                                            {{$emp_data->emp_dtl_3}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr class="mb-4">
                        <h5 style="margin-bottom: 30px;">Customer service will contact to:</h5>
                        <form action="{{route('checkout.post')}}" method="POST" id="general_form">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control basic @error('full_name') is-invalid @enderror" maxlength="32" name="full_name" value="{{ old('full_name') }}" placeholder="Full Name" onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                                @error('full_name') <div class="invalid-feedback"><span>{{$errors->first('full_name')}}</span></div>@enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control basic @error('mobile_number') is-invalid @enderror" maxlength="12" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Mobile number" onkeypress="return IsNumber(event, this.value, '12')" required>
                                @error('mobile_number') <div class="invalid-feedback"><span>{{$errors->first('mobile_number')}}</span></div>@enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control basic @error('full_address') is-invalid @enderror" maxlength="150" name="full_address" value="{{ old('full_address') }}" placeholder="Address" required>
                                @error('full_address') <div class="invalid-feedback"><span>{{$errors->first('full_address')}}</span></div>@enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control basic @error('post_code') is-invalid @enderror" maxlength="6" name="post_code" value="{{ old('post_code') }}" placeholder="Postcode" onkeypress="return IsNumber(event, this.value, '6')" required>
                                @error('post_code') <div class="invalid-feedback"><span>{{$errors->first('post_code')}}</span></div>@enderror
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn red-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
