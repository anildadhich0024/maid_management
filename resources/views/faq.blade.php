@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
         <h1>FAQ's</h1>
    </div>
     <div class="section section-padding">
        <div class="container">
            <div class="faqs-container">
                <div id="accordion">
                    @foreach($record_list as $key => $rec)
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
            </div>
        </div>
     </div>
@endsection