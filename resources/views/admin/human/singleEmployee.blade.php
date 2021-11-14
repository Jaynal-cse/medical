@extends('layouts.dashboard')

@section('breadcrumb')
      <div class="col-md-6">
        <h3 class="block-title">Employees</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">                     
            <li class="breadcrumb-item">
                <a href="#">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Employee List</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('employee_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('employee_delete')}}</strong>Please check in Employee List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('employee_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('employee_update')}}</strong>Please check in Employee List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('employee_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('employee_add')}}</strong>Please check in Employee List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>

        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <div class="top">
                    <div class="panel panel-bd">
                        <div class="panel-heading no-print">
                            <div class="float-left py-3">
                        <a href="{{url('employee')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add employee</button></a>
                    </div>
                    </div>
                    </div>
                </div>
                
                <div class="table-responsive mb-3">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User Image</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Priority</th>
                                <th>Status</th>       <td>{{$single->rel_to_designation_table->designation}}</td>
                                <th>Mobile No.</th>                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($singles as $single) 
                            <tr>
                               
                                <td>
                                    <img src="{{asset('uploads/employee/')}}/{{$single->picture}}" alt="" height="70" width="70">
                                </td>
                                
                                <td>{{$single->name}}</td>
                                <td>{{$single->designation}}</td>
                                <td>{{$single->department}}</td>
                                <td>{{$single->priority}}</td>
                                <td>{{$single->status}}</td>
                                <td>{{$single->mobile}}</td>                              
                                <td>{{$single->status}}</td>
                                <td>
                                  
                                     <a href="{{url('employeeEdit')}}/{{$single->id}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Edit Row">
                                    <i style="font-size: 20px;" class="ti-pencil-alt"></i>
                                </a>
                                    <a href="{{url('employeeDel')}}/{{$single->id}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete Row">
                                    <i style="font-size: 20px;" class="ti-trash"></i>
                                    </a>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>
    <!-- /Main Content -->
 @endsection
 
     
