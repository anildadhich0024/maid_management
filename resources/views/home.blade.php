@extends('layouts.app')

@section('content')
    <div class="banner-area">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($banner as $key => $rec)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img class="d-block w-100" src="{{asset('storage/banner_images')}}/{{$rec->banner_image}}">
                        <div class="banner-inner">
                            <div class="container">
                                <h1>{{$rec->line_first}}<b> {{$rec->line_second}}</b></h1><br>
                                <a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Maid'))}}" class="btn red-btn">Maid Search</a>
                                <a href="{{route('search.helper')}}?role={{base64_encode(config('constant.EMP_ROLE.Caregivers'))}}" class="btn black-btn">Caregivers Search</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="border-box">
                        <div class="border-box-inner"> <img src="{{asset('images/Experience-icon.svg')}}" width="70px" height="70px"
                                alt="">
                            <h3>35 Years of Experience</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-box">
                        <div class="border-box-inner"><img src="{{asset('images/Cost-Effective-icon.svg')}}" width="70px"
                                height="70px" alt="">
                            <h3>100% Cost Effective</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-box">
                        <div class="border-box-inner"> <img src="{{asset('images/Highly-Expert-Team-icon.svg')}}" width="70px"
                                height="70px" alt="">
                            <h3>Highly Expert Team</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-padding full-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Search and Hire</h2>
                    <p>Make this your first stop if you are looking for a<br>
                        domestic helper to take care of your loved ones.<br>
                        To view FDW profiles, registration is required.</p>
                    <a href="{{route('login')}}" class="btn red-btn">LOGIN/REGISTER NOW</a>
                </div>
                <div class="col-md-6">
                    <h2>Need to hire FDW urgently?</h2>
                    <p>Fast deployment in 3 days.<br>
                        Face-to-face interview.<br>
                        *Terms & conditions apply.</p>
                    <a href="{{route('services.list')}}" class="btn red-btn">TRY ADVANCE PLACEMENT SCHEME*</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-padding bg-helf-right">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/Who-We-Are.png')}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="col-padding-left">
                        <h2>Who We Are</h2>
                        <p>Welcome to Maid Management Services Pte Ltd (Formerly known as Maid Management Services – Sole Proprietorship). At Maid Management Service Pte Ltd., people are our business. Founded in 1986, Maid Management Services Pte Ltd., is one of the longest serving and most trusted maid agency in Singapore. We are committed to provide the best helpers and caregivers for your household needs. Over the years since inception, we have successfully assisted and matched domestic helpers and caregivers for thousands of employers and many of them remain as customers. We specialize in the placement of foreign domestic helpers and caregivers mainly from the Philippines, Indonesia and Myanmar.</p>
                        <a href="{{route('about_us')}}" class="btn blue-btn">Read More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="section section-padding-top">
        <div class="container">
            <h2 class="text-center heading-bottom">
                Our accreditations and partners
            </h2>
            <div uk-slider="autoplay: true; autoplay-interval: 3000">

                <div class="uk-position-relative">

                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m">
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/imge-1.png')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-15.png')}}" alt=""> </div>
                                </div>
                            </li>

                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-20.JPG')}}" alt=""> </div>
                                </div>
                            </li>



                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-24.jpg')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-23.png')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-22.png')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-21.png')}}" alt=""> </div>
                                </div>
                            </li>



                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-18.png')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-17.jpg')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-16.png')}}" alt=""> </div>
                                </div>
                            </li>
                            <li>
                                <div class="border-box">
                                    <div class="border-box-inner"> <img src="{{asset('images/image-19.jpg')}}?v={{date('His')}}" alt=""> </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>

        </div>
    </div>
    <div class="section section-padding bg-patter">
        <div class="container">
            <h2 class="text-center heading-bottom">Our Best Services For You</h2>
            <div class="row">
                <div class="col-md-4 text-center mt-30">
                    <a href="{{route('services.list')}}#maid-serv-1"><img src="{{asset('images/img-6.png')}}" alt=""></a>

                </div>
                <div class="col-md-4 text-center mt-30">
                   <img src="{{asset('images/img-1.png')}}" alt="">

                </div>
                <div class="col-md-4 text-center mt-30">
                   <img src="{{asset('images/img-2.png')}}" alt="">

                </div>
                <div class="col-md-4 text-center mt-30">
                  <img src="{{asset('images/img-3.png')}}" alt="">

                </div>
                <div class="col-md-4 text-center mt-30">
                    <img src="{{asset('images/img-4.png')}}" alt="">

                </div>
                <div class="col-md-4 text-center mt-30">
                   <img src="{{asset('images/img-5.png')}}" alt="">

                </div>
            </div><br><br>
            <div class="text-center">
                <a href="{{route('services.list')}}" class="btn blue-btn">VIEW ALL SERVICES</a>
            </div>
        </div>
    </div>
    <div class="section section-padding bg-common full-slide">
        <h2 class="text-center heading-bottom">
            Own Local Training Centers
        </h2>
        <div uk-slider>

            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

                <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-grid">
                    <li class="uk-transition-toggle" tabindex="0">
                        <img src="{{asset('images/Training-img-2.png')}}" alt="">
                        <div class="uk-position-center uk-panel">
                            <p class="uk-transition-slide-bottom-small"><a href="{{route('training')}}#link1">Language proficiency course (basic English)</a></p>
                        </div>
                    </li>
                    <li class="uk-transition-toggle" tabindex="0">
                        <img src="{{asset('images/Training-img-3.png')}}" alt="">
                        <div class="uk-position-center uk-panel">
                            <p class="uk-transition-slide-bottom-small"><a href="{{route('training')}}#link2">Housekeeping</a></p>
                        </div>
                    </li>
                    <li class="uk-transition-toggle" tabindex="0">
                        <img src="{{asset('images/Basiccookingclass.png')}}" alt="">
                        <div class="uk-position-center uk-panel">
                            <p class="uk-transition-slide-bottom-small"><a href="{{route('training')}}#link3">Basic cooking class</a></p>
                        </div>
                    </li>
                    <li class="uk-transition-toggle" tabindex="0">
                        <img src="{{asset('images/Caregivingforinfantandtoddler.png')}}" alt="">
                        <div class="uk-position-center uk-panel">
                            <p class="uk-transition-slide-bottom-small"><a href="{{route('training')}}#link4">Caregiving for infant and toddler</a></p>
                        </div>
                    </li>

                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                    uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                    uk-slider-item="next"></a>

            </div>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

        </div>
    </div>
    <div class="section section-padding  bg-2-patter">
        <h2 class="text-center heading-bottom">
            The MAID MS DIFFERENCE
        </h2>
        <div class="container max-test-width">
            <div uk-slider="autoplay: true">

                <div class="uk-position-relative">

                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-1@s uk-child-width-1-1@m">
                            @foreach($testimonial as $rec)
                                <li>
                                    <div class="testmonial-box">
                                        <div class="test-user"> <img src="{{asset('storage/person_photo')}}/{{$rec->person_photo}}" alt=""> </div>
                                        <p class="limit-text">{{substr($rec->testimonial_detail, 0, 300)}}</p>
                                        <h5>{{$rec->person_name}}</h5>
                                        <p class="designation">Customer</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="uk-hidden@s uk-light">
                        <a class="uk-position-center-left uk-position-small" href="#" uk-slidenav-previous
                            uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>

                    <div class="uk-visible@s">
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous
                            uk-slider-item="previous"></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next
                            uk-slider-item="next"></a>
                    </div>

                </div>

                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>
        </div>
    </div>
    <div class="section section-padding bg-common">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="heading-bottom">Latest From Blog</h2>
                    <div class="blog-box">
                        <img src="{{asset('storage/blog_image')}}/{{$blog_record->blog_image}}" alt="">
                        <div class="blog-des">
                            <p class="blog-time-com">{{date('d M, Y', strtotime($blog_record->created_at))}}</p>
                            <h3>{{$blog_record->blog_title}}</h3>
                            <p>@php echo html_entity_decode(substr($blog_record->blog_details, 0,200)) @endphp</p>
                            <div class="text-right">
                                <a href="{{route('blogs.show',base64_encode($blog_record->blog_id))}}">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{route('blog.list')}}" class="btn blue-btn">VIEW ALL</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-padding-left">
                        <div class="white-bg">
                            <ul class="nav nav-tabs tab-custom">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#blog-tab">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#news-tab">Covid-19 News</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="blog-tab" class="container tab-pane active maid-tab-home"><br>
                                    <ul>
                                        @foreach($blog_home as $rec)
                                            <li>
                                                <div class="maid-tab-home-img" style="background-image: url({{asset('storage/blog_image')}}/{{$rec->blog_image}})"></div>

                                                <h5><a href="{{route('blogs.show',base64_encode($rec->blog_id))}}">{{$rec->blog_title}}</a></h5>
                                                <P>{{date('d M, Y', strtotime($rec->created_at))}}</P>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="news-tab" class="container tab-pane fade maid-tab-home"><br>
                                    <ul>
                                        @foreach($blog_covid as $rec)
                                            <li>
                                                <div class="maid-tab-home-img" style="background-image: url({{asset('storage/blog_image')}}/{{$rec->blog_image}})"></div>
                                                <h5><a href="{{route('blogs.show',base64_encode($rec->blog_id))}}">{{$rec->blog_title}}</a></h5>
                                                <P>{{date('d M, Y', strtotime($rec->created_at))}}</P>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="section section-padding faqs">

        <div class="container">
            <h2 class="heading-bottom">FAQs</h2>
            <div class="faqs-container">
                <div id="accordion">
                    @foreach($faq as $key => $rec)
                        <div class="card">
                            <div class="card-header" id="heading{{$rec->faq_id}}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link {{ $key == 0 ? '' : 'collapsed'}}" data-toggle="collapse" data-target="#collapse{{$rec->faq_id}}"
                                        aria-expanded="{{ $key == 0 ? 'true' : 'false'}}" aria-controls="collapse{{$rec->faq_id}}">
                                        {{$rec->faq_question}}
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse{{$rec->faq_id}}" class="collapse {{ $key == 0 ? 'show' : ''}}" aria-labelledby="heading{{$rec->faq_id}}"
                                data-parent="#accordion">
                                <div class="card-body">
                                    {{$rec->faq_answer}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="{{route('faq.list')}}" class="btn blue-btn">View All</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-padding bg-news-letter">
        <div class="container news-lettter">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h3 class="text-white">Subscribe to the Maid
                        Management Services
                        Newsletter!</h3>
                </div>
                <div class="col-md-7">
                    <div class="news-letter-form">
                        <!-- Begin Mailchimp Signup Form -->

<div id="mc_embed_signup">
    <form action="https://maidms.us6.list-manage.com/subscribe/post?u=44b9dd6f643954a7c84c0ec15&amp;id=8ebdaea9a9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">


    <div class="mc-field-group">

        <input type="email" placeholder="Email Address" value="" name="EMAIL" class="required email" id="mce-EMAIL">
        <input type="submit" value="Subscribe Now!" style="border-radius: 0px" name="subscribe" id="mc-embedded-subscribe" class="button btn red-btn">
    </div>
        <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
        </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_44b9dd6f643954a7c84c0ec15_8ebdaea9a9" tabindex="-1" value=""></div>

        </div>
    </form>
    </div>

    <!--End mc_embed_signup-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
