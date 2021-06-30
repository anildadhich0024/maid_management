@extends('admin_panel.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="ftFormArray" class="col-lg-12 layout-spacing">
                @include('admin_panel.inc.validation_message')
                @include('admin_panel.inc.auth_message')
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">                                
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ isset($record_data) ? 'Update' : 'Create' }} Banner</h4> 
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area custom-autocomplete h-100"> 
                        <form action="{{ route('banner.update', isset($record_data) ? base64_encode($record_data->banner_id) : base64_encode(0) ) }}" method="POST" enctype="multipart/form-data" id="general_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Banner Line First</label>
                                    <input type="text" class="form-control basic" maxlength="50" name="line_first" value="{{ old('line_first', isset($record_data) ? $record_data->line_first : '') }}" placeholder="Banner Line First" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Banner Line Second</label>
                                    <input type="text" class="form-control basic" maxlength="50" name="line_second" value="{{ old('line_second', isset($record_data) ? $record_data->line_second : '') }}" placeholder="Banner Line Second" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col-6 custom-file-container">
                                    <label>Banner Images</label>
                                    <input type="hidden" name="banner_img_name" value="{{ isset($record_data) ? $record_data->banner_image : '' }}">
                                    <input type="file" class="form-control" accept="image/*" name="banner_file" multiple {{ isset($record_data) ? '' : 'required' }}>
                                    @if(isset($record_data) && isset($record_data->banner_image))
                                        <div class="images-box-r" style="min-height: 320px;background: url({{asset('storage/banner_images')}}/{{$record_data->banner_image}}"></div>
                                    @endif
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