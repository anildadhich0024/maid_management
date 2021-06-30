@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>Helper’s Profile</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('Success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success ! </strong> {{Session::get('Success')}}
                        </div>
                    @endif
                     <ul class="list-of-button">
                         <!-- <li><a href="#" class="btn red-btn"><i class="fas fa-calendar-alt"></i> Book for Interview</a></li> -->
                         <li><a href="callto:6345 9978" class="btn red-btn"><i class="fas fa-phone-alt"></i> 6345 9978 / 6466 6136</a></li>
                         <li><a href="{{route('profile.pdf',base64_encode($record->emp_id))}}" class="btn red-btn" target="_blank"><i class="fas fa-file-pdf"></i> PDF / Print Bio</a></li>
                         <li><a href="https://wa.me/+6594591290?text=Hello, I wants to hire {{$record->full_name}}" class="btn red-btn whatsapp"><i class="fab fa-whatsapp"></i> Quick chat</a></li>
                         <li><a href="https://t.me/maidmanagementservices?text=Hello, I wants to hire {{$record->full_name}}" class="btn red-btn paper-plane"><i class="fas fa-paper-plane"></i> Quick chat</a></li>
                     </ul>
                </div>
                <div class="col-md-5">
                    <div uk-slider>

                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m">
                                <li>
                                    <div class="details-page-slide {{ !Auth::check() ? 'blur_img' : ''}}" style="background-image: url({{asset('storage/employee_photo')}}/{{$record->emp_photo}})">

                                    </div>
                                </li>
                                @if(!empty($record->emp_full_photo))
                                    <li>
                                        <div class="details-page-slide {{ !Auth::check() ? 'blur_img' : ''}}" style="background-image: url({{asset('storage/employee_photo')}}/{{$record->emp_full_photo}})">
                                        </div>
                                    </li>
                                @endif
                            </ul>

                            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                        </div>

                        <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

                    </div>

                </div>
                <div class="col-md-7">
                    <div class="single-details">
                        <div class="personal-details">
                            <ul>
                                <li class="name-list">
                                    {{$record->full_name}}
                                    <span>{{$record->country_data->misc_title}}
                                        @if($record->country_data->misc_title == 'Indonesia')
                                            <img src="{{asset('images/Indonesia-flag.svg')}}" alt="{{$record->country_data->misc_title}}" title={{$record->country_data->misc_title}}>
                                        @elseif($record->country_data->misc_title == 'Philippines')
                                            <img src="{{asset('images/philippine-flag.svg')}}" alt="{{$record->country_data->misc_title}}" title={{$record->country_data->misc_title}}>
                                        @elseif($record->country_data->misc_title == 'Myanmar')
                                            <img src="{{asset('images/Myanmar-flag.svg')}}" alt="{{$record->country_data->misc_title}}" title={{$record->country_data->misc_title}}>
                                        @elseif($record->country_data->misc_title == 'Mizoram')
                                            <img src="{{asset('images/indian_flag.svg')}}" alt="{{$record->country_data->misc_title}}" title={{$record->country_data->misc_title}}>
                                        @else
                                            <img src="{{asset('images/Srilanka-flag.svg')}}" alt="{{$record->country_data->misc_title}}" title={{$record->country_data->misc_title}}>
                                        @endif
                                    </span>
                                </li>
                                <li class="ranking">
                                    <p>Ranking</p>
                                    5.0
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <table class="table mobile-table">
                        <tbody>
                          <tr>
                            <th>Age:</th>
                            <td><b>{{$record->emp_age}}</b></td>
                            <td>Language:</td>
                            <td><b>{{$record->language_data->misc_title}}</b></td>
                          </tr>
                          <tr>
                            <th>Weight:</th>
                            <td><b>{{$record->emp_weight}} kg</b></td>
                            <td>Age of Child:</td>
                            <td><b>{{ !empty($record->child_age) ? $record->child_age : 'None' }}</b></td>
                          </tr>
                          <tr>
                            <th>Height:</th>
                            <td><b>{{$record->emp_height}} CM</b></td>
                            <td>Birth Place:</td>
                            <td><b>{{$record->birth_place}}</b></td>
                          </tr>
                          <tr>
                            <th>Marital Status:</th>
                            <td><b>{{array_search($record->marital_status,config('constant.MARITAL_STATUS'))}}</b></td>
                            <td>Experience: </td>
                            <td><b>{{$record->emp_type_data->misc_title}}</b></td>
                          </tr>
                          <tr colspan="2">
                            <th>No. of siblings:</th>
                            <td><b>{{ !empty($record->sibling_no) ? $record->sibling_no : 'None' }}</b></td>
                            <th>No. of Children:</th>
                            <td><b>{{ !empty($record->child_count) ? $record->child_count : 'None' }}</b></td>
                          </tr>

                        </tbody>
                      </table><br>
                      <a href="{{route('cart',base64_encode($record->emp_id))}}" class="btn red-btn">Shortlist</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container border-top">
            <h2 class="heading-bottom">Video</h2>
            <div class="row">
                <div class="col-md-12">
                    <iframe width="100%" height="450" src="{{$record->video_link}}" frameborder="0" allow=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="section">
        <div class="container border-top">
            <h2 class="heading-bottom">Work Experiences</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="blank-box">
                        <h5>Heading </h5>
                        <p>It is a long established fact that a reader will be distracted by the readable content of</p>
                    </div>
                </div>


            </div>
        </div>
    </div> -->
@endsection
