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
                                <h4>{{ isset($record_data) ? 'Update' : 'Create' }} Testimonial</h4> 
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area custom-autocomplete h-100"> 
                        <form action="{{ route('testimonial.update', isset($record_data) ? base64_encode($record_data->testimonial_id) : base64_encode(0) )}}" method="POST" enctype="multipart/form-data" id="general_form">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Person Name <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="32" name="person_name" value="{{ old('person_name', isset($record_data) ? $record_data->person_name : '') }}" placeholder="Person Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Description <i>*</i></label>
                                    <div class="widget-content widget-content-area p-0">
                                        <textarea id="ck_editor" maxlength="150" name="testimonial_detail">{{ old('testimonial_detail', isset($record_data) ? $record_data->testimonial_detail : '') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label>Person Photo <i>*</i></label>
                                    <input type="file" class="form-control" accept="image/*" name="person_file" {{ isset($record_data) ? '' : 'required' }}>
                                    <input type="hidden" name="person_img_name" value="{{ isset($record_data) ? $record_data->person_photo : '' }}">
                                    @if(isset($record_data) && !empty($record_data->person_photo))
                                        <img class="images-box-r" src="{{asset('storage/person_photo')}}/{{$record_data->person_photo}}" width="400" style="padding-top:10px;"/>
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