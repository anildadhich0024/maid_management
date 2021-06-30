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
                                <h4>Manage Time</h4> 
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area custom-autocomplete h-100"> 
                        <form action="{{ route('setting.update', isset($record_data) ? base64_encode($record_data->setting_id) : base64_encode(0) )}}" method="POST" enctype="multipart/form-data" id="general_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Mon - Fri (Open Time) <i>*</i></label>
                                    <input type="time" class="form-control" name="mon_fri_open" value="{{ old('mon_fri_open', isset($record_data) ? $record_data->mon_fri_open : '') }}" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                <label for="email1">Mon - Fri (Close Time) <i>*</i></label>
                                    <input type="time" class="form-control" name="mon_fri_close" value="{{ old('mon_fri_close', isset($record_data) ? $record_data->mon_fri_close : '') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Sat - Sun (Open Time) <i>*</i></label>
                                    <input type="time" class="form-control" name="sat_sun_open" value="{{ old('sat_sun_open', isset($record_data) ? $record_data->sat_sun_open : '') }}" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                <label for="email1">Sat - Sun (Close Time) <i>*</i></label>
                                    <input type="time" class="form-control" name="sat_sun_close" value="{{ old('sat_sun_close', isset($record_data) ? $record_data->sat_sun_close : '') }}" required>
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