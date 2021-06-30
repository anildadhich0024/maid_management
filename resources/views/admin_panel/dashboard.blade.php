@extends('admin_panel.layouts.app')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" style="margin-top:40px"> 
            <div class="widget-heading col-lg-12">
                <h5 class="">Total Records</h5>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('employee.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_maid}}</p>
                            <h5 class="">Maid Registered</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('employee.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_caregivers}}</p>
                            <h5 class="">Caregivers  Registered</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('customer')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_customer}}</p>
                            <h5 class="">Customers</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('sub_admin.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_admin}}</p>
                            <h5 class="">Sub Admin</h5>
                        </div> 
                    </a>
                </div>
            </div>
        </div>
        <div class="row layout-top-spacing" style="margin-top:40px"> 
            <div class="widget-heading col-lg-12">
                <h5 class="">Current Month Records</h5>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('employee.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_maid_current}}</p>
                            <h5 class="">Maid Registered</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('employee.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_caregivers_current}}</p>
                            <h5 class="">Caregivers  Registered</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('customer')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_customer_current}}</p>
                            <h5 class="">Customers</h5>
                        </div> 
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="widget widget-one_hybrid widget-followers" style="height: 95%;">
                    <a href="{{route('sub_admin.index')}}">
                        <div class="widget-heading">
                            <p class="w-value">{{$count_admin_current}}</p>
                            <h5 class="">Sub Admin</h5>
                        </div> 
                    </a>
                </div>
            </div>
        </div> 
        <div class="row layout-top-spacing">
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Last 5 Maids Registered</h5>
                    </div>
                    <div class="widget-content">
                        @if(count($maid_list) > 0)
                            @foreach($maid_list as $rec)
                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="avatar avatar-xl">
                                                    <span class="avatar-title"><img src="{{asset('storage/employee_photo')}}/{{$rec->emp_photo}}" width="40" /></span>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>{{$rec->full_name}}</h4>
                                                <p class="meta-date">{{date('d M, Y', strtotime($rec->created_at))}}</p>
                                            </div>
                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>{{$rec->country_data->misc_title}}</span> </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div align="center">No maid found</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-one">
                    <div class="widget-heading">
                        <h5 class="">Last 5 Caregivers Registered</h5>
                    </div>
                    <div class="widget-content">
                        @if(count($caregivers_list) > 0)
                            @foreach($caregivers_list as $rec)
                                <div class="transactions-list">
                                    <div class="t-item">
                                        <div class="t-company-name">
                                            <div class="t-icon">
                                                <div class="avatar avatar-xl">
                                                    <span class="avatar-title"><img src="{{asset('storage/employee_photo')}}/{{$rec->emp_photo}}" width="40" /></span>
                                                </div>
                                            </div>
                                            <div class="t-name">
                                                <h4>{{$rec->full_name}}</h4>
                                                <p class="meta-date">{{date('d M, Y', strtotime($rec->created_at))}}</p>
                                            </div>
                                        </div>
                                        <div class="t-rate rate-inc">
                                            <p><span>{{$rec->country_data->misc_title}}</span> </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div align="center">No caregivers found</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">Recent 5 Bookings</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="th-content">Booking Number</div></th>
                                        <th><div class="th-content">Name</div></th>
                                        <th><div class="th-content">Mobile Number</div></th>
                                        <th><div class="th-content">Address</div></th>
                                        <th><div class="th-content">Post Code</div></th>
                                        <th><div class="th-content">Booking Date</div></th>
                                        <th><div class="th-content">Action</div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($ord_list) > 0)
                                        @foreach($ord_list as $rec)
                                            <tr>
                                                <td><div class="td-content product-name">{{$rec->order_number}}</div></td>
                                                <td><div class="td-content">{{$rec->full_name}}</div></td>
                                                <td><div class="td-content">{{$rec->mobile_number}}</div></td>
                                                <td style="width:320px;"><div class="td-content">{{$rec->full_address}}</div></td>
                                                <td><div class="td-content">{{$rec->post_code}}</div></td>
                                                <td><div class="td-content">{{date('d M, Y', strtotime($rec->created_at))}}</div></td>
                                                <td><div class="td-content">
                                                    <a href="{{route('order.show',base64_encode($rec->order_id))}}">
                                                        <span class=" shadow-none badge outline-badge-primary">View Order</span>
                                                    </a>
                                                </div></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td align="center" colspan="3">No sales found</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © {{date('Y')}} <a target="_blank" href="{{url('')}}">{{env('APP_NAME')}}</a>, All rights reserved.</p>
        </div>
    </div>
    
@endsection  