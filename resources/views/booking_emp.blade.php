@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-md-9">
                    <div class="user-details">
                        <h3>Shortlisted Helpers (Booking No. : {{$order_data->order_number}})</h3>
                        <table class="table display-auto">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_data->order_detail as $rec)
                                    <tr>
                                        <th><a href="{{route('helper.profile',base64_encode($rec->emp_data->emp_id))}}">{{$rec->emp_data->full_name}}</a></th>
                                        <td>{{array_search($rec->emp_data->emp_role,config('constant.EMP_ROLE'))}}</td>
                                        <th>{{$rec->emp_data->emp_code}}</th>
                                        <td><div class="user-photo" style="background-image: url({{asset('storage/employee_photo')}}/{{$rec->emp_data->emp_photo}});"></div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
