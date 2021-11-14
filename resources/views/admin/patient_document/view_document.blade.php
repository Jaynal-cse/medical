@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctors</a></li>
						<li class="breadcrumb-item active">View Doctor</li>
					</ol>
				</div>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">Patient's Document</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('patient_document.create')}}" class="btn btn-sm btn-primary">Add Document</a>
                                </div>
                            </div>
                
                <div class="table-responsive-sm mb-3">
                    <table id="#" class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Patient ID</th>
                                <td>{{$data->patient_id}}</td>
                        </tr>
                        <tr>
                            <th>Patient Name</th>
                            <td>{{$data->doctor_name}}</td>
                        </tr>
                        <tr>
                            <th>Patient Document</th>
                                <td><iframe src="{{asset('uploads/patient_document/')}}/{{$data->patient_document}}" height="700" width="800" frameborder="0"></iframe></td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection