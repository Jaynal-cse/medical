@extends('layouts.dashboard');

@section('breadcrumb')
      <div class="col-md-6">
        <h3 class="block-title">Prescriptions</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">                     
            <li class="breadcrumb-item">
                <a href="#">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Prescription</li>
        </ol>
    </div>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('prescription_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('prescription_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            
            @if(session('prescription_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('prescription_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('prescription_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('prescription_add')}}</strong></h6>
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
                    <div class="float-left">
                        <h3 class="widget-title">Prescription List</h3>    
                    </div>
                    <div class="float-right pr-5">
                        <a href="{{url('addPrescription')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add</button></a>
                    </div>   
                </div>
                
                <div class="table-responsive mb-3">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="select-all">
                                        <label class="custom-control-label" for="select-all"></label>
                                    </div>
                                </th>
                                <th>Department</th>
                                <th>Doctor Name </th>
                                <th>Patient Name</th>
                                <th>Address</th>
                                <th>Problem</th>
                                <th>Prescription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prescription as $prescriptions)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="{{$prescriptions->id}}">
                                        <label class="custom-control-label" for="{{$prescriptions->id}}"></label>
                                    </div>
                                </td>
                                <td>{{$prescriptions->department}}</td>
                                <td>{{$prescriptions->doctor_name}}</td>
                                <td>{{$prescriptions->patient_name}}</td>
                                <td>{{$prescriptions->address}}</td>
                                <td>{{$prescriptions->problem}}</td>
                                <td>{{$prescriptions->prescription}}</td>
                                <td>
                                     <a href="{{url('prescriptionView')}}/{{$prescriptions->id}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span> VIEW</button></a>

                                     <a href="{{url('prescriptionEdit')}}/{{$prescriptions->id}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span> EDIT</button></a>

                                    <a href="{{url('prescriptionDel')}}/{{$prescriptions->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span> DELETE</button></a>
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
@endsection