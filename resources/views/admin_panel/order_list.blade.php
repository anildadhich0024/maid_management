@extends('admin_panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow mb-1">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__('Manage Bookings')}}</h4>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('order.index')}}" method="GET">
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" maxlength="10" class="form-control mb-3 mb-md-0" name="order_number" placeholder="Order Number" value="{{$request->order_number}}" onkeypress="return IsNumber(event, this.value, '10')"> 
                                </div>
                                <div class="col-md-3">
                                    <input type="text" maxlength="30" class="form-control mb-3 mb-md-0" name="full_name" placeholder="User Name" value="{{$request->full_name}}" onkeypress="return IsAlphaApos(event, this.value, '32')"> 
                                </div>
                                <div class="col-md-3">
                                    <input type="text" maxlength="30" class="form-control mb-3 mb-md-0" name="post_code" placeholder="Post Code" value="{{$request->post_code}}" onkeypress="return IsNumber(event, this.value, '4')"> 
                                </div>
                                <div class="col-md-3 d-flex">
                                    <button class="btn btn-primary mr-3" type="submit">
                                        Filter
                                    </button>
                                    <button class="btn btn-danger" type="button" id="ClearFilter">
                                        Clear Filter
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4 table-hover">
                                <thead>
                                    <tr>
                                        <th>Booking Number</th>
                                        <th style="width:190px;">Name</th>
                                        <th>Mobile Number</th>
                                        <th style="width:325px;">Address</th>
                                        <th>Post Code</th>
                                        <th>Booking Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($record_list) > 0)
                                        @foreach($record_list as $record)
                                            <tr>
                                                <td>{{$record->order_number}}</td>
                                                <td>{{$record->full_name}}</td>
                                                <td>{{$record->mobile_number}}</td>
                                                <td>{{$record->full_address}}</td>
                                                <td>{{$record->post_code}}</td>
                                                <td>{{date('d M, Y', strtotime($record->created_at))}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('order.show',base64_encode($record->order_id))}}">
                                                        <span class=" shadow-none badge outline-badge-primary">View Order</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="5" align="center"><strong>No record's found</strong></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="paginating-container pagination-solid justify-content-end">
                            {{$record_list->appends($request->all())->render('vendor.pagination.custom')}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  