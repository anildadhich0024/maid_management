@extends('admin_panel.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                @include('admin_panel.inc.validation_message')
                @include('admin_panel.inc.auth_message')
                <div class="statbox widget box box-shadow mb-1">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__('Manage Maid / Caregivers')}}</h4>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('employee.index')}}" method="GET">
                        <div class="widget-content widget-content-area">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="text" maxlength="10" class="form-control mb-3 mb-md-0" name="emp_code" placeholder="FDW Code" value="{{$request->emp_code}}"> 
                                </div>
                                <div class="col-md-4">
                                    <input type="text" maxlength="30" class="form-control mb-3 mb-md-0" name="full_name" placeholder="Full Name" value="{{$request->full_name}}" onkeypress="return IsAlphaApos(event, this.value, '32')"> 
                                </div>
                                <div class="col-md-4">
                                    <select name="nationality_id" class="form-control">
                                        <option value="">== Select Nationality ==</option>
                                        @foreach($nationality as $rec)
                                            <option {{ $request->nationality_id == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="emp_type_id" class="form-control">
                                        <option value="">== Maid Type ==</option>
                                        @foreach($emp_type as $rec)
                                            <option {{ $request->emp_type_id == $rec->misc_id ? 'selected' : ''}} value="{{$rec->misc_id}}">{{$rec->misc_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="order_by" class="form-control">
                                        <option value="">== Order By ==</option>
                                        <option {{ $request->order_by == 'DESC' ? 'selected' : ''}} value="DESC">OLD to NEW</option>
                                        <option {{ $request->order_by == 'ASC' ? 'selected' : ''}} value="ASC">NEW to OLD</option>
                                    </select>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <button class="btn btn-primary mr-3" type="submit">
                                        Filter
                                    </button>
                                    <button class="btn btn-danger" type="button" id="ClearFilter">
                                        Clear Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="statbox widget box box-shadow">
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4 table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Date of Birth</th>
                                        <th>Birth Place</th>
                                        <th>Age</th>
                                        <th>Photo</th>
                                        <th>Reg. Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($record_list) > 0)
                                        @foreach($record_list as $record)
                                            <tr>
                                                <td>{{$record->full_name}}</td>
                                                <td>{{array_search($record->emp_role,config('constant.EMP_ROLE'))}}</td>
                                                <td>{{date('d M, Y', strtotime($record->emp_dob))}}</td>
                                                <td>{{$record->birth_place}}</td>
                                                <td>{{$record->emp_age}}</td>
                                                <td><img src="{{asset('storage/employee_photo')}}/{{$record->emp_photo}}" width="100" /></td>
                                                <td>{{date('d F, Y', strtotime($record->created_at))}}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="{{route('employee.show',base64_encode($record->emp_id))}}"  data-toggle="tooltip" data-placement="top" title="View Profile" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-success"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg></a></li>
                                                        @if(Auth::user()->user_role->roles->role_title == 'ROLE_ADMIN')
                                                            <li><a href="{{route('employee.edit',base64_encode($record->emp_id))}}"  data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-primary"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a></li>
                                                            <li>
                                                                <form action="{{route('employee.destroy',base64_encode($record->emp_id))}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <buttton type="submit" class="delete-user" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                                                                </form>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="8" align="center"><strong>No record's found</strong></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="paginating-container pagination-solid justify-content-end">
                            {{$record_list->appends($request->all())->render('vendor.pagination.custom')}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  