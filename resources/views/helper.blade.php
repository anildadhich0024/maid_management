@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url(images/banner-img-2.png);">
         <h1>{{array_search(base64_decode($request->role),config('constant.EMP_ROLE'))}} Search</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            @if(Session::has('Success'))
                <div class="alert alert-success" role="alert">
                    <strong>Success ! </strong> {{Session::get('Success')}}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="search-form">
                        <h3>Advanced Search</h3>
                        <form action="{{route('search.helper')}}" method="GET">
                            <input type="hidden" name="role" value="{{$request->role}}">
                            <div class="form-group">
                                <input class="form-control" type="text" name="name" placeholder="{{array_search(base64_decode($request->role),config('constant.EMP_ROLE'))}} Name" value="{{$request->name}}" aria-label="Search">
                            </div>
                            <div class="form-group">
                                <select name="language" class="form-control">
                                    <option value="">Language</option>
                                    @foreach($language as $rec)
                                        <option {{ $request->language == $rec->misc_id ? 'selected' : '' }} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="emp_type" class="form-control">
                                    <option value="">{{array_search(base64_decode($request->role),config('constant.EMP_ROLE'))}} Type</option>
                                    @foreach($emp_type as $rec)
                                        <option {{ $request->emp_type == $rec->misc_id ? 'selected' : '' }} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="nationality" class="form-control">
                                    <option value="">Select Nationality</option>
                                    @foreach($nationality as $rec)
                                        <option {{ $request->nationality == $rec->misc_id ? 'selected' : '' }} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="form-group">
                                <select name="education" class="form-control">
                                    <option value="">Education</option>
                                    @foreach($education as $rec)
                                        <option {{ $request->education == $rec->misc_id ? 'selected' : '' }} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                    @endforeach
                                </select>
                              </div>
                                @php
                                    $service = !empty($service_id) && isset($service_id) ? $service_id : '';
                                    $service = !empty($service) ? explode(',',$service) : '';
                                @endphp
                              <div class="form-group">
                                @foreach($services as $rec)
                                <div class="form-group">
                                    <label style="margin-bottom: 0px">
                                    <input type="checkbox" name="service[]" value="{{$rec->misc_id}}" {{!empty($service) && in_array($rec->misc_id,$service) ? 'checked' : ''}}>{{$rec->misc_title}}<label>
                                </div>
                                @endforeach
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn red-btn">Search</button>
                              </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        @if(count($helper_list) > 0)
                            @foreach($helper_list as $rec)
                                <div class="col-md-6">
                                    <div class="maid-search-details">
                                        <div class="search-profile-img"><div class="search-profile-img-img {{ !Auth::check() || Auth::user()->user_role->roles->role_title != 'ROLE_USER' ? 'blur_img' : ''}}" style="background-image: url({{asset('storage/employee_photo')}}/{{$rec->emp_photo}})"></div></div>
                                        <div class="search-profile-details">
                                        <p>{{$rec->full_name}} <span>{{$rec->country_data->misc_title}}</span>
                                            @if($rec->country_data->misc_title == 'Indonesia')
                                                <img src="{{asset('images/Indonesia-flag.svg')}}" width="31" height="22" alt="{{$rec->country_data->misc_title}}" title={{$rec->country_data->misc_title}}>
                                            @elseif($rec->country_data->misc_title == 'Philippines')
                                                <img src="{{asset('images/philippine-flag.svg')}}" width="31" height="22" alt="{{$rec->country_data->misc_title}}" title={{$rec->country_data->misc_title}}>
                                            @elseif($rec->country_data->misc_title == 'Myanmar')
                                                <img src="{{asset('images/Myanmar-flag.svg')}}" width="31" height="22" alt="{{$rec->country_data->misc_title}}" title={{$rec->country_data->misc_title}}>
                                            @elseif($rec->country_data->misc_title == 'Mizoram')
                                                <img src="{{asset('images/indian_flag.svg')}}" width="31" height="22" alt="{{$rec->country_data->misc_title}}" title={{$rec->country_data->misc_title}}>
                                            @else
                                                <img src="{{asset('images/Srilanka-flag.svg')}}" width="31" height="22" alt="{{$rec->country_data->misc_title}}" title={{$rec->country_data->misc_title}}>
                                            @endif
                                        </p>
                                        </div>
                                        <div class="profile-rating">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        </div>
                                        <div class="search-more-details">
                                        <ul>
                                            <li>Experience <span>{{$rec->emp_type_data->misc_title}}</span></li>
                                            <li>Language <span>{{$rec->language_data->misc_title}}</span></li>
                                        </ul>
                                        </div>
                                        <div class="btn-group">
                                            <a href="{{route('cart',base64_encode($rec->emp_id))}}" class="btn red-btn">Shortlist</a>
                                            <a href="{{route('helper.profile',base64_encode($rec->emp_id))}}" class="btn red-outline-btn" target="_blank">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        <div class="col-md-12 text-center"><strong style="font-size:20px;">No record's found</strong></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
