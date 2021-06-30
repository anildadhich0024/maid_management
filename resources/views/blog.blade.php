@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
        <h1>Blogs</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        @foreach($blog_list as $rec)
                            <div class="col-md-6">
                                <div class="blog-box">
                                    <div class="blog-img" style="background-image: url('{{asset('storage/blog_image')}}/{{$rec->blog_image}}');"></div>
                                    <div class="blog-content">
                                        <h4>Date: {{date('m d, Y', strtotime($rec->created_at))}} | Author: Admin</h4>
                                        <h3>{{$rec->blog_title}}</h3>
                                        <p>@php echo html_entity_decode(substr($rec->blog_details, 0,200)) @endphp</p> 
                                        <a href="{{route('blogs.show',base64_encode($rec->blog_id))}}" class="know-more">Know More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection