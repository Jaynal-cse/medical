@extends('layouts.dashboard')

@section('breadcrumb')
      <div class="col-md-6">
        <h3 class="block-title">Designations</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">                     
            <li class="breadcrumb-item">
                <a href="#">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Designation</li>
        </ol>
    </div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('designation_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('designation_add')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('user_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('user_delete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('schedule_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('schedule_add')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>

        <!-- Widget Item -->
        <div class="col-md-6">
            <div class="widget-area-2 proclinic-box-shadow">
                <div class="top">
                    <div class="float-left py-3">
                        <a href="{{url('employee')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add employee</button></a>
                    </div> 
                </div>
                
                <div class="table-responsive mb-3">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($designation as $desig)
                            <tr>
                                <th>{{$loop->index+1}}</th>
                                <td>{{$desig->designation}}</td>                           
                                <td>
                                   <!--  <a href="#"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span> VIEW</button></a>
                                     
                                     <a href="#"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span> EDIT</button></a> -->
                                     <a href="{{url('designationDel')}}/{{$desig->id}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete Row">
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

        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add User</button>
                </div>

                <div class="card-body">
                    <form action="{{url('designationPost')}}" method="post">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-11">
                                <label for="">Add Designation</label>
                                <input type="text" class="form-control" placeholder="Designation" name="designation">
                            </div>
                       
                            <div class="form-group col-md-6 mb-3 pt-4 ml-3">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- /Main Content -->
@endsection