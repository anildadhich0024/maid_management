@extends('layouts.app')

@section('content')
<div class="client-panel">
        <div class="container">
            <div class="row">
                @include('layouts.sidebar')
                <div class="col-md-9">
                      <div class="user-details">
                        <h3>My Account</h3>
                         <ul>
                             <li><b>User SN：</b>{{Auth::user()->account_id}}</li>
                             <li><b>E-mail：</b>{{Auth::user()->email_address}}</li>
                         </ul>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection