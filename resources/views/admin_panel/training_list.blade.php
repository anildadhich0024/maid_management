@extends('admin_panel.layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row layout-top-spacing">
            <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                @include('admin_panel.inc.validation_message')
                @include('admin_panel.inc.auth_message')
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{__('Manage Training Images')}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-4 table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Created Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($record_list) > 0)
                                        @foreach($record_list as $record)
                                            <tr>
                                                <td>{{$record->training_title}}</td>
                                                <td><img src="{{asset('storage/training_images')}}/{{$record->training_image}}" width="100" /></td>
                                                <td>{{date('d F, Y H:i A', strtotime($record->created_at))}}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="{{route('training.edit',base64_encode($record->training_id))}}"  data-toggle="tooltip" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></a></li>
                                                        <li>
                                                            <form action="{{route('training.destroy',base64_encode($record->training_id))}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <buttton type="submit" class="delete-user" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td colspan="4" align="center"><strong>No record's found</strong></td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="paginating-container pagination-solid justify-content-end">
                            {{$record_list->links('vendor.pagination.custom')}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection  
