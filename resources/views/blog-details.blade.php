@extends('layouts.app')

@section('content')
    <div class="common-banner" style="background-image: url('{{asset('images/banner-img-2.png')}}');">
        <h1>Blog Details</h1>
    </div>
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(Session::has('Success'))
                        <div class="alert alert-success" role="alert">
                            <strong>Seccess ! </strong> {{Session::get('Success')}}
                        </div>
                    @endif
                    <h2>{{$record_data->blog_title}}</h2>
                    <h4 class="blog-date">Date: {{date('d M, Y', strtotime($record_data->created_at))}}</h4>
                    <div class="share-link">
                        <a target="_blank" class="share-btn twitter" href="http://twitter.com/share?text=$record_data->blog_title&url={{route('blogs.show',base64_encode($record_data->blog_id))}}"> Twitter </a>
                        <a target="_blank" class="share-btn facebook" href="http://www.facebook.com/sharer.php?u={{route('blogs.show',base64_encode($record_data->blog_id))}}"> Facebook </a>
                        <!-- <a target="_blank" class="share-btn reddit" href="#"> Reddit </a>
                        <a target="_blank" class="share-btn hackernews" href="#"> Hacker News </a>  -->
                        <a target="_blank" class="share-btn linkedin" href="https://www.linkedin.com/cws/share?url={{route('blogs.show',base64_encode($record_data->blog_id))}}&xdOrigin={{url('')}}&xd_origin_host={{url('')}}"> LinkedIn </a>
                    </div>
                    <div class="blog-signle-img">
                        <img src="{{asset('storage/blog_image')}}/{{$record_data->blog_image}}" alt="">
                    </div>
                    <p>@php echo html_entity_decode(nl2br($record_data->blog_details)) @endphp</p>

                    @if(count($record_data->comment) > 0)
                        <div class="list-of-commint">
                            <ol class="commentlist">
                                @foreach($record_data->comment as $rec)
                                    <li id="comment-1" class="comment even thread-even depth-1">
                                        <article id="div-comment-1" class="comment-body">
                                            <footer class="comment-meta">
                                                <div class="comment-author vcard">
                                                    <b class="fn">{{$rec->full_name}}</b> <span class="says">says:</span>
                                                </div>
                                                <div class="comment-metadata"><time>{{date('M d, Y', strtotime($rec->created_at))}} at {{date('H:i A', strtotime($rec->created_at))}}</time></div>
                                            </footer>
                                            <div class="comment-content">
                                                <p>{{nl2br($rec->comment_details)}}</p>
                                            </div>
                                        </article>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    @endif
                    <div class="commint-form">
                        <h4>Please Post Your Comments & Reviews</h4>
                        <form action="{{route('blog.comment')}}" method="POST" id="general_form">
                            @csrf
                            <input type="hidden" name="blog_id" value={{$record_data->blog_id}}>
                            <div class="form-group">
                                <label for=""><b>Full Name</b></label>
                                <input type="text" class="form-control basic @error('full_name') is-invalid @enderror" maxlength="32" placeholder="Full Name"  name="full_name" value="{{ old('full_name')}}" placeholder="Full Name" onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                                @error('full_name') <div class="invalid-feedback"><span>{{$errors->first('full_name')}}</span></div>@enderror
                            </div>
                            <div class="form-group">
                                <label for=""><b>Email address</b></label>
                                <input type="email" class="form-control basic @error('email_address') is-invalid @enderror" maxlength="50" placeholder="Email Address" name="email_address" value="{{ old('email_address')}}" required>
                                @error('email_address') <div class="invalid-feedback"><span>{{$errors->first('email_address')}}</span></div>@enderror
                            </div>
                            <div class="form-group">
                                <label for=""><b>Express your thoughts, idea or write a feedback</b></label>
                                <textarea rows="5" class="form-control basic @error('comment_details') is-invalid @enderror" name="comment_details" maxlength="250" placeholder="Comment" required>{{old('comment_details')}}</textarea>
                                @error('comment_details') <div class="invalid-feedback"><span>{{$errors->first('comment_details')}}</span></div>@enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn red-btn"> Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 sidebar-single">
                    <aside class="widget">
                        <h3 class="widget-title">Recent Blogs</h3>
                        <ul>
                            @foreach($blog_home as $rec)
                                <li><a href="{{route('blogs.show',base64_encode($rec->blog_id))}}">{{$rec->blog_title}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget">
                        <h3 class="widget-title">Recent News</h3>
                        <ul>
                            @foreach($blog_covid as $rec)
                                <li><a href="{{route('blogs.show',base64_encode($rec->blog_id))}}">{{$rec->blog_title}}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                </div>
            </div>

        </div>
    </div>
@endsection
