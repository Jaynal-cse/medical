@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>All Death Report</h6>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('death_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('death_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('death_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('death_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('death_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('death_add')}}</strong></h6>
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
                        <div class="add pb-2">
                            <a href="{{url('addDeath')}}"><button type="button" class="btn btn-success mb-0"><span aria-hidden="true">+</span> Add Death Report</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL.No</th>
                                    <th>Patient ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Doctor Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @php $i = 1; @endphp
                                    @foreach($deaths as $death)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                        
                                        <td>{{$death->patient_id}}</td>
                                        <td>{{$death->title}}</td>
                                        <td>{{substr($death->description,0,30)}}....more</td>
                                        <td>{{$death->doctor_name}}</td>
                                        <td>{{$death->status}}</td>
                                        <td>
                                            <a href="{{url('deathView')}}/{{$death->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            
                                            <a href="{{url('deathEdit')}}/{{$death->id}}"type="submit" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>

                                            <a href="{{url('deathDel')}}/{{$death->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
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