@extends('layouts.dashboard');

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Online Appointment</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Appointment</a></li>
        <li class="breadcrumb-item active">Online Appointment</li>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>


        <!-- Widget Item -->
        <div class="col-md-12 pt-3">
            <div class="card">
                    <div class="card-header">
                        <h6><strong>Online Appointment Information</strong></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Appointment ID</th>
                                    <th>Department</th>
                                    <th>Doctor Name</th>
                                    <th>Patient Name</th>
                                    <th>Problem</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($apps as $app)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                      <td>{{$app->appointment_id}}</td>
                                      <td>{{$app->rel_to_dept_table->department_name?? ''}}</td>
                                      <td>{{$app->rel_to_doctor_table->doctor_name?? ''}}</td>
                                      <td>{{$app->name?? ''}}</td>
                                      <td>{{$app->problem?? ''}}</td>
                                      <td>{{$app->date?? ''}}</td>
                                      <td>{{$app->time?? ''}}</td>
                                      <td>{{$app->phone?? ''}}</td>
                                      <td>{{$app->email?? ''}}</td>
                                      <td>
                                          @if($app->status == 0)
                                           <span class="badge badge-warning">Pending</span>
                                           @elseif($app->status == 1)
                                           <span class="badge badge-success">Confirmed</span>
                                           @elseif($app->status == 2)
                                           <span class="badge badge-danger">Cancelled</span>
                                           @else
                                        
                                           @endif
                                      </td>
                                        <td>
                                            <a href="{{url('online_appointment_view')}}/{{$app->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            <a href="{{url('online_appointment_delete')}}/{{$app->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach


                                    
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>

@endsection