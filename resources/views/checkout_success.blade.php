@extends('layouts.app')

@section('content')
    <div class="client-panel">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                      <div class="user-details text-center checksucc">
                          <h2 class="text-success text-center">Successful!</h2>
                          <p>Thank you for your booking!</p>
                           <h1 class="text-primary">Booking No.!:<span> {{$order_data->order_number}}</span></h1>
                      </div>
                </div>
            </div>
        </div>
    </div>
@endsection
