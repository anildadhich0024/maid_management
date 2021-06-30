@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url(images/banner-img-2.png);">
         <h1>Services</h1>
    </div>
     <div class="section section-padding-bottom">
        <div class="container">
            @foreach($record_list as $rec)
                <div class="row section-padding-top align-items-center" id="maid-serv-{{$rec->services_id}}">
                    <div class="col-md-6">
                    <h3 class="heading-bottom">{{$rec->services_title}}</h3>
                    <p>@php echo html_entity_decode(nl2br($rec->services_detail)) @endphp</p>

                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('storage/services_photo')}}/{{$rec->services_photo}}" alt="">
                    </div>

                </div>
            @endforeach
            <!-- <div class="section-padding-top text-center">
                <a href="#" class="btn red-btn">View All Services</a>
            </div> -->
        </div>
     </div>
@endsection
