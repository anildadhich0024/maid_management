@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(!empty($emp_cart))
                        <div class="user-details">
                            <h5 style="margin-bottom: 30px;">Do you want to confirm your booking?</h5>
                            @if(Session::has('Success'))
                                <div class="alert alert-success" role="alert">
                                    <strong>Success ! </strong> {{Session::get('Success')}}
                                </div>
                            @endif
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col" class="text-center">Action</th>
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
                                            <td class="text-center"><a href="{{route('cart.remove',base64_encode($key))}}" onclick="return confirm('Are you sure to remove helper from cart ?')" class="table-btn">Remove</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <div class="mobile-center"><a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}" class="btn btn-primary">Continue to see others</a></div>
                            <div class="text-center mt-3">
                                <a href="{{route('checkout')}}" class="btn red-btn">Click To Confirm Booking</a>
                            </div>
                        </div>
                    @else
                        <div class="text-center mt-3">
                            <a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}" class="btn red-btn">Continue to see others</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
