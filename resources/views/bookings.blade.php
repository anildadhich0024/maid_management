@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-md-9">
                    <div class="user-details">
                        <h3>My Current Booking Record</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Booking Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($order_data) > 0)
                                    @foreach($order_data as $rec)
                                        <tr>
                                            <th><a href="{{route('bookings',base64_encode($rec->order_id))}}">{{$rec->order_number}}</a></th>
                                            <th>{{$rec->full_name}}</th>
                                            <th>{{$rec->mobile_number}}</th>
                                            <td>{{date('d M, Y', strtotime($rec->created_at))}}</td>
                                            <td class="text-center"><a href="{{route('bookings',base64_encode($rec->order_id))}}" class="table-btn">Details</a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="5" class="text-center">No booking found</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
