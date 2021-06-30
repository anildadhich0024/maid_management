@extends('admin_panel.layouts.app')

@section('content')
<style>
p{
    font-size:17px;
    padding:15px 0px 5px 0px !important;
}
i{
    color:red;
}
.illness .custom-control-label{
    color:#d6d6d6 !important;
}
th{
    background:#f6f4f4;
    padding:10px 5px;
    text-align:center;
    color:#000;
}
td{
    color:#000;
    padding:10px 5px;
    font-size:15px;
}
</style>
    <div class="container-fluid">
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="ftFormArray" class="col-lg-12 layout-spacing">
                @include('admin_panel.inc.validation_message')
                @include('admin_panel.inc.auth_message')
                <div class="statbox widget box box-shadow">
                    
                    <div class="widget-content widget-content-area custom-autocomplete h-100"> 
                        <form action="{{ route('employee.update', isset($record_data) ? base64_encode($record_data->emp_id) : base64_encode(0) )}}" method="POST" enctype="multipart/form-data" id="general_form">
                            @csrf
                            @method('PUT')
                            <p><strong>(A1) PROFILE OF FDW</strong></p>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Full Name <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="32" name="full_name" value="{{ old('full_name', isset($record_data) ? $record_data->full_name : '') }}" placeholder="Full Name" onkeypress="return IsAlphaApos(event, this.value, '32')" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">FDW <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="10" name="emp_code" value="{{ old('emp_code', isset($record_data) ? $record_data->emp_code : '') }}" placeholder="Foreign domestic worker codes" required>
                                </div>
                            </div>
                            @php
                                $emp_role = old('emp_role[]', isset($record_data) ? $record_data->emp_role : '');
                                $emp_role = !empty($emp_role) ? explode(',',$emp_role) : '';

                                $service_id = old('service_id[]', isset($record_data) ? $record_data->service_id : '');
                                $service_id = !empty($service_id) ? explode(',',$service_id) : '';
                            @endphp
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Employee Role <i>*</i></label>
                                    <select name="emp_role[]" class="form-control tagging" multiple="multiple">
                                        @foreach(config('constant.EMP_ROLE') as $value => $key)
                                            <option {{!empty($emp_role) && in_array($key,$emp_role) ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Services Provided <i>*</i></label>
                                    <select name="service_id[]" class="form-control tagging" multiple="multiple">
                                        @foreach($services as $rec)
                                            <option {{!empty($service_id) && in_array($rec->misc_id,$service_id) ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Employee Type <i>*</i></label>
                                    <select name="emp_type_id" class="form-control" required>
                                        <option value="">== Select Employee Type ==</option>
                                        @foreach($emp_type as $rec)
                                            <option {{ old('emp_type_id', isset($record_data) ? $record_data->emp_type_id : '') == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Video Link <i>*</i></label>
                                    <input type="text" class="form-control" name="video_link" value="{{ old('video_link', isset($record_data) ? $record_data->video_link : '') }}" placeholder="Video URL" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Language <i>*</i></label>
                                    <select name="language_id" class="form-control" required>
                                        <option value="">== Select Language ==</option>
                                        @foreach($language as $rec)
                                            <option {{ old('language_id', isset($record_data) ? $record_data->language_id : '') == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Religion <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="32" name="religion_title" value="{{ old('religion_title', isset($record_data) ? $record_data->religion_title : '') }}" placeholder="Religion Title" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Birth Place <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="50" name="birth_place" value="{{ old('birth_place', isset($record_data) ? $record_data->birth_place : '') }}" placeholder="Birth Place" onkeypress="return IsAlphaApos(event, this.value, '50')" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Age <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="2" name="emp_age" value="{{ old('emp_age', isset($record_data) ? $record_data->emp_age : '') }}" placeholder="Age" onkeypress="return IsNumber(event, this.value, '2')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Height (CM) <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="3" name="emp_height" value="{{ old('emp_height', isset($record_data) ? $record_data->emp_height : '') }}" placeholder="Height (CM)" onkeypress="return IsNumber(event, this.value, '3')" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Weight (KG) <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="3" name="emp_weight" value="{{ old('emp_weight', isset($record_data) ? $record_data->emp_weight : '') }}" placeholder="Weight (KG)" onkeypress="return IsNumber(event, this.value, '3')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Residential address in home country <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="150" name="home_address" value="{{ old('home_address', isset($record_data) ? $record_data->home_address : '') }}" placeholder="Residential address in home country" onkeypress="return LenCheck(event, this.value, '150')" required>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">DOB <i>*</i></label>
                                    <input type="date" class="form-control" name="emp_dob" value="{{ old('emp_dob', isset($record_data) ? $record_data->emp_dob : '') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Nationality <i>*</i></label>
                                    <select name="nationality_id" class="form-control" required>
                                        <option value="">== Select Nationality ==</option>
                                        @foreach($nationality as $rec)
                                            <option {{ old('nationality_id', isset($record_data) ? $record_data->nationality_id : '') == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Education Level <i>*</i></label>
                                    <select name="education_id" class="form-control" required>
                                        <option value="">== Select Education ==</option>
                                        @foreach($education as $rec)
                                            <option {{ old('education_id', isset($record_data) ? $record_data->education_id : '') == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Marital status <i>*</i></label>
                                    <select name="marital_status" class="form-control" required>
                                        <option value="">== Select Marital Status ==</option>
                                        @foreach(config('constant.MARITAL_STATUS') as $value => $key)
                                            <option {{ old('marital_status', isset($record_data) ? $record_data->marital_status : '') == $key ? 'selected' : ''}} value="{{$key}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6 custom-file-container">
                                    <label for="email1">Airport Name <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="50" name="airport_name" value="{{ old('airport_name', isset($record_data) ? $record_data->airport_name : '') }}" placeholder="Airport Name" onkeypress="return IsAlphaApos(event, this.value, '50')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">No of Siblings</label>
                                    <input type="text" class="form-control basic" maxlength="2" name="sibling_no" value="{{ old('sibling_no', isset($record_data) ? $record_data->sibling_no : '') }}" placeholder="No of Siblings" onkeypress="return IsNumber(event, this.value, '2')">
                                </div>
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">Age of siblings</label>
                                    <input type="text" class="form-control basic" maxlength="10" name="sibling_age" value="{{ old('sibling_age', isset($record_data) ? $record_data->sibling_age : '') }}" placeholder="Age of siblings">
                                </div>
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">Mobile Number</label>
                                    <input type="text" class="form-control basic" maxlength="10" name="mobile_number" value="{{ old('mobile_number', isset($record_data) ? $record_data->mobile_number : '') }}" placeholder="Mobile Number" onkeypress="return IsNumber(event, this.value, '10')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">No. of children</label>
                                    <input type="text" class="form-control basic" maxlength="1" name="child_count" value="{{ old('child_count', isset($record_data) ? $record_data->child_count : '') }}" placeholder="No. of children" onkeypress="return IsNumber(event, this.value, '1')">
                                </div>
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">Age of children</label>
                                    <input type="text" class="form-control basic" maxlength="10" name="child_age" value="{{ old('child_age', isset($record_data) ? $record_data->child_age : '') }}" placeholder="Age of children" onkeypress="return LenCheck(event, this.value, '10')">
                                </div>
                                <div class="form-group col-4 custom-file-container">
                                    <label for="email1">Expected salary <i>*</i></label>
                                    <input type="text" class="form-control basic" maxlength="5" name="expected_salary" value="{{ old('expected_salary', isset($record_data) ? $record_data->expected_salary : '') }}" placeholder="Expected salary" onkeypress="return IsNumber(event, this.value, '5')" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col-6 custom-file-container">
                                    <label>Profile Photo <i>*</i></label>
                                    <input type="file" class="form-control" accept="image/*" name="emp_file" {{ isset($record_data) ? '' : 'required' }}>
                                    <input type="hidden" name="employee_img_name" value="{{ isset($record_data) ? $record_data->emp_photo : '' }}">
                                    @if(isset($record_data) && !empty($record_data->emp_photo))
                                        <img class="images-box-r" src="{{asset('storage/employee_photo')}}/{{$record_data->emp_photo}}" width="400" style="padding-top:10px;"/>
                                    @endif
                                </div>
                                <div class="form-group mb-4 col-6 custom-file-container">
                                    <label>Full Photo <i>*</i></label>
                                    <input type="file" class="form-control" accept="image/*" name="emp_full_file" {{ isset($record_data) ? '' : 'required' }}>
                                    <input type="hidden" name="employee_full_img_name" value="{{ isset($record_data) ? $record_data->emp_full_photo : '' }}">
                                    @if(isset($record_data) && !empty($record_data->emp_full_photo))
                                        <img class="images-box-r" src="{{asset('storage/employee_photo')}}/{{$record_data->emp_full_photo}}" width="400" style="padding-top:10px;"/>
                                        <a href="{{route('delete.image',base64_encode($record_data->emp_id))}}" onclick="return confirm('Are you sure to delete full image ?')">
                                            <button class="images-box-r-button" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-12 custom-file-container"><label>Ranking of work referencces(1 being the most preferred): </label></div>
                                    <div class="col-sm-12">
                                        @php
                                            $work_pref = old('work_prefrence[]', isset($record_data) ? $record_data->work_prefrence : '');
                                            $work_pref = !empty($work_pref) ? explode(',',$work_pref) : '';
                                        @endphp
                                        @foreach($work as $key => $rec)
                                            <div class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" name="work_prefrence[]" class="custom-control-input" id="{{$key}}" value="{{$rec->misc_id}}" {{!empty($work_pref) && in_array($rec->misc_id,$work_pref) ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="{{$key}}">{{$rec->misc_title}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <p><strong>(A2) Medical History/Dietary Restrictions</strong></p>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Allergies(if any)</label>
                                    <input type="text" class="form-control basic" maxlength="100" name="allergies_detail" value="{{ old('allergies_detail', isset($record_data) ? $record_data->allergies_detail : '') }}" placeholder="Allergies(if any)">
                                </div>
                            </div>
                            <div class="row illness">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Past and existing illnesses (including chronic ailments and illnesses requiring medication):</label>
                                </div>
                                <div class="form-group col-12 custom-file-container">
                                    <div class="form-group row col-12">
                                        <div class="col-sm-3 custom-file-container"><label>Mental illness</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_1" id="ill_no_1" class="custom-control-input" value="No" {{ old('ill_no_1', isset($record_data) ? $record_data->ill_no_1 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_1">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_1" id="ill_yes_1" class="custom-control-input" value="Yes" {{ old('ill_no_1', isset($record_data) ? $record_data->ill_no_1 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_1">Yes </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 custom-file-container"><label>Epilepsy</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_2" id="ill_no_2" class="custom-control-input" value="No" {{ old('ill_no_2', isset($record_data) ? $record_data->ill_no_2 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_2">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_2" id="ill_yes_2" class="custom-control-input" value="Yes" {{ old('ill_no_2', isset($record_data) ? $record_data->ill_no_2 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_2">Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-12">
                                        <div class="col-sm-3 custom-file-container"><label>Asthma</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_3" id="ill_no_3" class="custom-control-input" value="No" {{ old('ill_no_3', isset($record_data) ? $record_data->ill_no_3 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_3">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_3" id="ill_yes_3" class="custom-control-input" value="Yes" {{ old('ill_no_3', isset($record_data) ? $record_data->ill_no_3 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_3">Yes </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 custom-file-container"><label>Diabetes</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_4" id="ill_no_4" class="custom-control-input" value="No" {{ old('ill_no_4', isset($record_data) ? $record_data->ill_no_4 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_4">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_4" id="ill_yes_4" class="custom-control-input" value="Yes" {{ old('ill_no_4', isset($record_data) ? $record_data->ill_no_4 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_4">Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-12">
                                        <div class="col-sm-3 custom-file-container"><label>Hypertension</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_5" id="ill_no_5" class="custom-control-input" value="No" {{ old('ill_no_5', isset($record_data) ? $record_data->ill_no_5 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_5">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_5" id="ill_yes_5" class="custom-control-input" value="Yes" {{ old('ill_no_5', isset($record_data) ? $record_data->ill_no_5 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_5">Yes </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 custom-file-container"><label>Tuberculosis</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_6" id="ill_no_6" class="custom-control-input" value="No" {{ old('ill_no_6', isset($record_data) ? $record_data->ill_no_6 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_6">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_6" id="ill_yes_6" class="custom-control-input" value="Yes" {{ old('ill_no_6', isset($record_data) ? $record_data->ill_no_6 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_6">Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-12">
                                        <div class="col-sm-3 custom-file-container"><label>Heart disease</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_7" id="ill_no_7" class="custom-control-input" value="No" {{ old('ill_no_7', isset($record_data) ? $record_data->ill_no_7 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_7">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_7" id="ill_yes_7" class="custom-control-input" value="Yes" {{ old('ill_no_7', isset($record_data) ? $record_data->ill_no_7 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_7">Yes </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 custom-file-container"><label>Malaria</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_8" id="ill_no_8" class="custom-control-input" value="No" {{ old('ill_no_8', isset($record_data) ? $record_data->ill_no_8 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_8">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_8" id="ill_yes_8" class="custom-control-input" value="Yes" {{ old('ill_no_8', isset($record_data) ? $record_data->ill_no_8 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_8">Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-12">
                                        <div class="col-sm-3 custom-file-container"><label>Operations</label></div>
                                        <div class="col-sm-3">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_9" id="ill_no_9" class="custom-control-input" value="No" {{ old('ill_no_9', isset($record_data) ? $record_data->ill_no_9 : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_no_9">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="ill_no_9" id="ill_yes_9" class="custom-control-input" value="Yes" {{ old('ill_no_9', isset($record_data) ? $record_data->ill_no_9 : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="ill_yes_9">Yes </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 custom-file-container"><label>Other</label></div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control basic" maxlength="50" name="existing_illnesses_other" placeholder="Other" value="{{ old('existing_illnesses_other', isset($record_data) ? $record_data->existing_illnesses_other : '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Physical disablities</label>
                                    <input type="text" class="form-control basic" maxlength="100" name="disabilities_detail" value="{{ old('disabilities_detail', isset($record_data) ? $record_data->disabilities_detail : '') }}" placeholder="Physical disablities">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Dietary restrictions</label>
                                    <input type="text" class="form-control basic" maxlength="100" name="dietary_detail" value="{{ old('dietary_detail', isset($record_data) ? $record_data->dietary_detail : '') }}" placeholder="Dietary restrictions">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-3 custom-file-container"><label>Food handling preferences</label></div>
                                    <div class="col-sm-9">
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="food_type_1" class="custom-control-input" id="food_type_1" value="Yes"  {{ old('food_type_1', isset($record_data) ? $record_data->food_type_1 : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="food_type_1">No Pork</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox" name="food_type_2" class="custom-control-input" id="food_type_2" value="Yes"  {{ old('food_type_2', isset($record_data) ? $record_data->food_type_2 : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="food_type_2">No Beef</label>
                                        </div>
                                        <div class="custom-control custom-checkbox custom-control-inline">
                                            <label class="">Other</label>
                                            <input style="border: none; border-bottom:#000 solid 1px; width:300px; margin-left:15px;" maxlength="50" type="text" name="food_type_3" value="{{ old('food_type_3', isset($record_data) ? $record_data->food_type_3 : '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><strong>(A3) Others</strong></p>
                            <div class="row">
                                <div class="form-group row col-9">
                                    <div class="col-sm-8 custom-file-container"><label>Preferred no. of rest days per month </label></div>
                                    <div class="col-sm-4">
                                        <input type="text" name="rest_day" class="form-control basic" maxlength="2" placeholder="rest days per month" value="{{ old('rest_day', isset($record_data) ? $record_data->rest_day : '') }}" onkeypress="return IsNumber(event, this.value, '3')">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">Any Other Remarks</label>
                                    <input type="text" class="form-control basic" maxlength="100" name="any_other_remark" value="{{ old('any_other_remark', isset($record_data) ? $record_data->any_other_remark : '') }}" placeholder="Any Other Remarks">
                                </div>
                            </div>
                            <p><strong>(B1) Method of Evaluation of Skills</strong></p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="fwd_declaration" id="customCheck1" {{ old('fwd_declaration', isset($record_data) ? $record_data->fwd_declaration : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="customCheck1">Based on FDW's declaration, no evaluation/observation by Singapore EA or overseas training centre/EA</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><strong>Interviewed by Singapore EA</strong></p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="tel_interview_ea" id="telephone" {{ old('tel_interview_ea', isset($record_data) ? $record_data->tel_interview_ea : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="telephone">Interviewed via telephone/teleconference</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="video_interview_ea" id="videoconference" {{ old('video_interview_ea', isset($record_data) ? $record_data->video_interview_ea : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="videoconference">Interviewed via videoconference</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="person_interview_ea" id="person" {{ old('person_interview_ea', isset($record_data) ? $record_data->person_interview_ea : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="person">Interviewed in person</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="observation_interview_ea" id="observation" {{ old('observation_interview_ea', isset($record_data) ? $record_data->observation_interview_ea : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="observation">Interviewed in person and also made observation of FDW in the areas of work listed in table</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <table border="1" width="100%">
                                        <tr>
                                            <th width="6%"><strong>S. No</strong></th>
                                            <th width="25%"><strong>Area of works</strong></th>
                                            <th><strong>Willingness</strong></br>Yes / No</th>
                                            <th width="20%"><strong>Experience</strong></br>Yes/No if yes, state the no. of years</th>
                                            <th width="35%"><strong>Assessment/Observation</strong></br>Please state qualitative observations of FDW and/ or rate the FDW (Indicate N.A. of no evalution was done) Poor......Excellent..N.A, 1 2 3 4 5 N.A</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                Care of infants/children</br>
                                                Please Specify age range</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="infants_age_sin" value="{{ old('infants_age_sin', isset($record_data) ? $record_data->infants_age_sin : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_1" value="{{ old('willing_sin_1', isset($record_data) ? $record_data->willing_sin_1 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_1" value="{{ old('exp_sin_1', isset($record_data) ? $record_data->exp_sin_1 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_1" value="{{ old('rat_sin_1', isset($record_data) ? $record_data->rat_sin_1 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Care of infants/children</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_2" value="{{ old('willing_sin_2', isset($record_data) ? $record_data->willing_sin_2 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_2" value="{{ old('exp_sin_2', isset($record_data) ? $record_data->exp_sin_2 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_2" value="{{ old('rat_sin_2', isset($record_data) ? $record_data->rat_sin_2 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Case of elderly</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_3" value="{{ old('willing_sin_3', isset($record_data) ? $record_data->willing_sin_3 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_3" value="{{ old('exp_sin_3', isset($record_data) ? $record_data->exp_sin_3 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_3" value="{{ old('rat_sin_3', isset($record_data) ? $record_data->rat_sin_3 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Case of Disabled</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_4" value="{{ old('willing_sin_4', isset($record_data) ? $record_data->willing_sin_4 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_4" value="{{ old('exp_sin_4', isset($record_data) ? $record_data->exp_sin_4 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_4" value="{{ old('rat_sin_4', isset($record_data) ? $record_data->rat_sin_4 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>
                                                Cooking</br>
                                                Please specify cuisines:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="cooking_sin" value="{{ old('cooking_sin', isset($record_data) ? $record_data->cooking_sin : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_5" value="{{ old('willing_sin_5', isset($record_data) ? $record_data->willing_sin_5 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_5" value="{{ old('exp_sin_5', isset($record_data) ? $record_data->exp_sin_5 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_5" value="{{ old('rat_sin_5', isset($record_data) ? $record_data->rat_sin_5 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>
                                                Language abilities (spoken)</br>
                                                Please specify:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="language_sin" value="{{ old('language_sin', isset($record_data) ? $record_data->language_sin : '') }}"></br>
                                            </td>
                                            <td style="background: #d6d6d6;"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_6" value="{{ old('exp_sin_6', isset($record_data) ? $record_data->exp_sin_6 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_6" value="{{ old('rat_sin_6', isset($record_data) ? $record_data->rat_sin_6 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>
                                                Other skill, if any</br>
                                                Please specify:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="50" type="text" name="other_skill_sin" value="{{ old('other_skill_sin', isset($record_data) ? $record_data->other_skill_sin : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_sin_7" value="{{ old('willing_sin_7', isset($record_data) ? $record_data->willing_sin_7 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_sin_7" value="{{ old('exp_sin_7', isset($record_data) ? $record_data->exp_sin_7 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_sin_7" value="{{ old('rat_sin_7', isset($record_data) ? $record_data->rat_sin_7 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <p><strong>Interviewed by overseas training centre / EA, (Please state name of foreigntraining centre / EA:) State if the third party is certified (e.g. ISO9001) or audited periodically by the EA:</strong><input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="ea_center" value="{{ old('ea_center', isset($record_data) ? $record_data->ea_center : '') }}"></p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="tel_interview_tr" id="telephone1" {{ old('tel_interview_tr', isset($record_data) ? $record_data->tel_interview_tr : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="telephone1">Interviewed via telephone/teleconference</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="video_interview_tr" id="videoconference1" {{ old('video_interview_tr', isset($record_data) ? $record_data->video_interview_tr : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="videoconference1">Interviewed via videoconference</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="person_interview_tr" id="person1" {{ old('person_interview_tr', isset($record_data) ? $record_data->person_interview_tr : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="person1">Interviewed in person</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="observation_interview_tr" id="observation1" {{ old('observation_interview_tr', isset($record_data) ? $record_data->observation_interview_tr : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="observation1">Interviewed in person and also made observation of FDW in the areas of work listed in table</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <table border="1" width="100%">
                                        <tr>
                                            <th width="6%"><strong>S. No</strong></th>
                                            <th width="25%"><strong>Area of works</strong></th>
                                            <th><strong>Willingness</strong></br>Yes / No</th>
                                            <th width="20%"><strong>Experience</strong></br>Yes/No if yes, state the no. of years</th>
                                            <th width="35%"><strong>Assessment/Observation</strong></br>Please state qualitative observations of FDW and/ or rate the FDW (Indicate N.A. of no evalution was done) Poor......Excellent..N.A, 1 2 3 4 5 N.A</th>
                                        </tr>
                                        <tr>
                                            <td>1.</td>
                                            <td>
                                                Care of infants/children</br>
                                                Please Specify age range</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="infants_age_ea" value="{{ old('infants_age_ea', isset($record_data) ? $record_data->infants_age_ea : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_1" value="{{ old('willing_ea_1', isset($record_data) ? $record_data->willing_ea_1 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_1" value="{{ old('exp_ea_1', isset($record_data) ? $record_data->exp_ea_1 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_1" value="{{ old('rat_ea_1', isset($record_data) ? $record_data->rat_ea_1 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Care of infants/children</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_2" value="{{ old('willing_ea_2', isset($record_data) ? $record_data->willing_ea_2 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_2" value="{{ old('exp_ea_2', isset($record_data) ? $record_data->exp_ea_2 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_2" value="{{ old('rat_ea_2', isset($record_data) ? $record_data->rat_ea_2 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Case of elderly</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_3" value="{{ old('willing_ea_3', isset($record_data) ? $record_data->willing_ea_3 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_3" value="{{ old('exp_ea_3', isset($record_data) ? $record_data->exp_ea_3 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_3" value="{{ old('rat_ea_3', isset($record_data) ? $record_data->rat_ea_3 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Case of Disabled</td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_4" value="{{ old('willing_ea_4', isset($record_data) ? $record_data->willing_ea_4 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_4" value="{{ old('exp_ea_4', isset($record_data) ? $record_data->exp_ea_4 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_4" value="{{ old('rat_ea_4', isset($record_data) ? $record_data->rat_ea_4 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>
                                                Cooking</br>
                                                Please specify cuienes:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="cooking_ea" value="{{ old('cooking_ea', isset($record_data) ? $record_data->cooking_ea : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_5" value="{{ old('willing_ea_5', isset($record_data) ? $record_data->willing_ea_5 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_5" value="{{ old('exp_ea_5', isset($record_data) ? $record_data->exp_ea_5 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_5" value="{{ old('rat_ea_5', isset($record_data) ? $record_data->rat_ea_5 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>
                                                Language abilities (spoken)</br>
                                                Please specify:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="30" type="text" name="language_ea" value="{{ old('language_ea', isset($record_data) ? $record_data->language_ea : '') }}"></br>
                                            </td>
                                            <td style="background: #d6d6d6;"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_6" value="{{ old('exp_ea_6', isset($record_data) ? $record_data->exp_ea_6 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_6" value="{{ old('rat_ea_6', isset($record_data) ? $record_data->rat_ea_6 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>
                                                Other skill, if any</br>
                                                Please specify:</br>
                                                <input style="border: none; border-bottom:1px #000 solid;" maxlength="50" type="text" name="other_skill_ea" value="{{ old('other_skill_ea', isset($record_data) ? $record_data->other_skill_ea : '') }}"></br>
                                            </td>
                                            <td><input style="border: none; text-align:center;" maxlength="3" type="text" name="willing_ea_7" value="{{ old('willing_ea_7', isset($record_data) ? $record_data->willing_ea_7 : '') }}" onkeypress="return IsAlpha(event, this.value, '3')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="2" type="text" name="exp_ea_7" value="{{ old('exp_ea_7', isset($record_data) ? $record_data->exp_ea_7 : '') }}" onkeypress="return IsNumber(event, this.value, '2')"></td>
                                            <td><input style="border: none; text-align:center;" maxlength="1" type="text" name="rat_ea_7" value="{{ old('rat_ea_7', isset($record_data) ? $record_data->rat_ea_7 : '') }}"  onkeypress="return IsNumber(event, this.value, '1')"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <p><strong>(C1) Employment History Overseas</strong></p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <table border="1" width="100%">
                                        <tr>
                                            <th width="20%" align="center" colspan="2"><strong>Date</strong></th>
                                            <th width="25%" rowspan="2"><strong>Country(including FDW's home country)</strong></th>
                                            <th width="20%" rowspan="2"><strong>Employer</strong></th>
                                            <th width="15%" rowspan="2"><strong>Work Duties</strong></th>
                                            <th width="40%" rowspan="2"><strong>Remarks</strong></th>
                                        </tr>
                                        <tr>
                                            <th width="10%" align="center"><strong>From</strong></th>
                                            <th width="10%" align="center"><strong>To</strong></th>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; text-align:center;" type="date" name="start_date_1" value="{{ old('start_date_1', isset($record_data) ? $record_data->start_date_1 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="date" name="end_date_1" value="{{ old('end_date_1', isset($record_data) ? $record_data->end_date_1 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="country_dtl_1" value="{{ old('country_dtl_1', isset($record_data) ? $record_data->country_dtl_1 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="emp_dtl_1" value="{{ old('emp_dtl_1', isset($record_data) ? $record_data->emp_dtl_1 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="work_dtl_1" value="{{ old('work_dtl_1', isset($record_data) ? $record_data->work_dtl_1 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="remark_dtl_1" value="{{ old('remark_dtl_1', isset($record_data) ? $record_data->remark_dtl_1 : '') }}"></td>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; text-align:center;" type="date" name="start_date_2" value="{{ old('start_date_2', isset($record_data) ? $record_data->start_date_2 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="date" name="end_date_2" value="{{ old('end_date_2', isset($record_data) ? $record_data->end_date_2 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="country_dtl_2" value="{{ old('country_dtl_2', isset($record_data) ? $record_data->country_dtl_2 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="emp_dtl_2" value="{{ old('emp_dtl_2', isset($record_data) ? $record_data->emp_dtl_2 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="work_dtl_2" value="{{ old('work_dtl_2', isset($record_data) ? $record_data->work_dtl_2 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="remark_dtl_2" value="{{ old('remark_dtl_2', isset($record_data) ? $record_data->remark_dtl_2 : '') }}"></td>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; text-align:center;" type="date" name="start_date_3" value="{{ old('start_date_3', isset($record_data) ? $record_data->start_date_3 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="date" name="end_date_3" value="{{ old('end_date_3', isset($record_data) ? $record_data->end_date_3 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="country_dtl_3" value="{{ old('country_dtl_3', isset($record_data) ? $record_data->country_dtl_3 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="50" name="emp_dtl_3" value="{{ old('emp_dtl_3', isset($record_data) ? $record_data->emp_dtl_3 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="work_dtl_3" value="{{ old('work_dtl_3', isset($record_data) ? $record_data->work_dtl_3 : '') }}"></td>
                                            <td><input style="border: none; text-align:center;" type="text" maxlength="100" name="remark_dtl_3" value="{{ old('remark_dtl_3', isset($record_data) ? $record_data->remark_dtl_3 : '') }}"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <p><strong>(C2) Employment History in Singapore</strong></p>
                            <div class="row illness">
                                <div class="form-group col-12 custom-file-container">
                                    <div class="form-group row col-12">
                                        <div class="col-sm-5 custom-file-container"><label>Previous working experience in Singapore</label></div>
                                        <div class="col-sm-7">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="sing_exp" id="sing_exp_no" class="custom-control-input" value="No" {{ old('sing_exp', isset($record_data) ? $record_data->sing_exp : 'No') == 'No' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="sing_exp_no">No </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" name="sing_exp" id="sing_exp_yes" class="custom-control-input" value="Yes" {{ old('sing_exp', isset($record_data) ? $record_data->sing_exp : '') == 'Yes' ? 'checked' : ''}}>
                                                <label class="custom-control-label" for="sing_exp_yes">Yes </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 custom-file-container">
                                    <label for="email1">(The EA is required to obtain the FDW's employment history from MOM and furnish the employer with the employment history of the EDW. The employer may also verify the EDW's employment history in SIngapore through WPOL using SingPass)</label>
                                </div>
                            </div>
                            <p><strong>(C3) Feedback from previous employers in Singapore</strong></p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <table border="1" width="100%">
                                        <tr>
                                            <th width="30%"><strong>Employeer Name</strong></th>
                                            <th width="70%"><strong>Feedback</strong></th>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="50" name="fdb_emp_1" value="{{ old('fdb_emp_1', isset($record_data) ? $record_data->fdb_emp_1 : '') }}"></td>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="150" name="fdb_dtl_1" value="{{ old('fdb_dtl_1', isset($record_data) ? $record_data->fdb_dtl_1 : '') }}"></td>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="50" name="fdb_emp_2" value="{{ old('fdb_emp_2', isset($record_data) ? $record_data->fdb_emp_2 : '') }}"></td>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="150" name="fdb_dtl_2" value="{{ old('fdb_dtl_2', isset($record_data) ? $record_data->fdb_dtl_2 : '') }}"></td>
                                        </tr>
                                        <tr>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="50" name="fdb_emp_3" value="{{ old('fdb_emp_3', isset($record_data) ? $record_data->fdb_emp_3 : '') }}"></td>
                                            <td><input style="border: none; width:100%;" type="text" maxlength="150" name="fdb_dtl_3" value="{{ old('fdb_dtl_3', isset($record_data) ? $record_data->fdb_dtl_3 : '') }}"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <p><strong>(D)AVAILABILITY OF FDW TO BE INTERVIEWED BY PROSPECTIVE EMPLOYER</p>
                            <div class="row">
                                <div class="form-group row col-12">
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="fdw_no_interview" id="fdw_no_interview" {{ old('fdw_no_interview', isset($record_data) ? $record_data->fdw_no_interview : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="fdw_no_interview">FDW is not available for interview</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="fdw_tel_interview" id="fdw_tel_interview" {{ old('fdw_tel_interview', isset($record_data) ? $record_data->fdw_tel_interview : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="fdw_tel_interview">FDW can be interviewed by phone</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="fdw_video_interview" id="fdw_video_interview" {{ old('fdw_video_interview', isset($record_data) ? $record_data->fdw_video_interview : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="fdw_video_interview">FDW can be interviewed by video-conference</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 custom-file-container">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="Yes" name="fdw_per_interview" id="fdw_per_interview" {{ old('fdw_per_interview', isset($record_data) ? $record_data->fdw_per_interview : '') == 'Yes' ? 'checked' : ''}}>
                                            <label class="custom-control-label" for="fdw_per_interview">FDW can be interviewed in person</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><strong>(E) OTHER REMARKS</strong></p>
                            <div class="row">
                                <div class="form-group col-12 custom-file-container">
                                    <input type="text" class="form-control basic" maxlength="100" name="other_remark" value="{{ old('other_remark', isset($record_data) ? $record_data->other_remark : '') }}" placeholder="Other Remarks">
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