@extends('admin_panel.layouts.app')

@section('content')
<style>
i{
    color:red;
}
</style>
    <div class="container-fluid">
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="ftFormArray" class="col-lg-12 layout-spacing">
                @include('admin_panel.inc.validation_message')
                @include('admin_panel.inc.auth_message')
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ isset($record_data) ? 'Update' : 'Create' }} Office Address</h4> 
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area custom-autocomplete h-100"> 
                        <form action="{{ route('address.update', isset($record_data) ? base64_encode($record_data->address_id) : base64_encode(0) )}}" method="POST" enctype="multipart/form-data" id="general_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Title <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="32" name="address_title" value="{{ old('address_title', isset($record_data) ? $record_data->address_title : '') }}" placeholder="Head Office / Branch Office"  onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Phone Number <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="50" name="phone_number" value="{{ old('phone_number', isset($record_data) ? $record_data->phone_number : '') }}" placeholder="+61 454 545 4545 / 547 444 521" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Full Address <i>*</i></label>
                                    <input type="text" class="form-control" name="full_address" id="full_address" value="{{ old('full_address', isset($record_data) ? $record_data->full_address : '') }}" placeholder="Office Address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Iframe MAP <i>*</i></label>
                                    <input type="text" class="form-control" name="iframe_url" id="iframe_url" value="{{ old('iframe_url', isset($record_data) ? $record_data->iframe_url : '') }}" placeholder="Iframe MAP" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('Save & Exit')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  