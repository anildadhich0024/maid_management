@extends('admin_panel.layouts.app')

@section('content')
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="doc-container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="invoice-container">
                                <div class="invoice-inbox">
                                    <div id="ct" class="">
                                        <div class="invoice-00001">
                                            <div class="content-section">
                                                <div class="inv--head-section inv--detail-section">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <div class="d-flex">
                                                                <img class="company-logo" src="{{asset('assets/img/logo.jpg')}}" alt="company">
                                                                <h3 class="in-heading align-self-center">Maid Management</h3>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 text-sm-right">
                                                            <p class="inv-list-number"><span class="inv-title">Order No : </span> <span class="inv-number">#{{$order_data->order_number}}</span></p>
                                                        </div>

                                                        <div class="col-sm-6 align-self-center mt-3">
                                                            <p class="inv-street-addr">Maid Management</p>
                                                            <p class="inv-email-address">mmsdatas@gmail.com</p>
                                                            <p class="inv-email-address">+65 6345 9978 / 6466 6136</p>
                                                        </div>
                                                        <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                            <p class="inv-created-date"><span class="inv-title">Invoice Date : </span> <span class="inv-date">{{date('d M, Y', strtotime($order_data->created_at))}}</span></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--detail-section inv--customer-detail-section">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 align-self-center">
                                                            <p class="inv-to">Invoice To</p>
                                                        </div>
                                                        
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                            <p class="inv-customer-name">{{$order_data->full_name}}</p>
                                                            <p class="inv-street-addr">{{$order_data->full_address}}, {{$order_data->post_code}}</p>
                                                            <p class="inv-email-address">{{$order_data->mobile_number}}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Helper Name</th>
                                                                    <th scope="col">Code</th>
                                                                    <th scope="col">Photo</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                $i = 1;
                                                                @endphp
                                                                @foreach($order_data->order_detail as $rec)
                                                                    <tr>
                                                                        <td>{{$i}}</td>
                                                                        <td>{{$rec->emp_data->full_name}}</td>
                                                                        <td>{{$rec->emp_data->emp_code}}</td>
                                                                        <td><img src="{{asset('storage/employee_photo')}}/{{$rec->emp_data->emp_photo}}" alt="{{$rec->emp_data->full_name}}" witdth="70"></td>
                                                                    </tr>
                                                                @php
                                                                $i++;
                                                                @endphp
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="inv--note">

                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p>Note: Thank you for doing Business with us.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div> 
                                        
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © {{date('Y')}} <a target="_blank" href="{{route('home')}}">Maid Management</a>, All rights reserved.</p>
        </div>
    </div>
@endsection  