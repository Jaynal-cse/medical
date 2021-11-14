@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('patient_document.index')}}">Patient Document</a></li>
						<li class="breadcrumb-item active">Add Document</li>
					</ol>
				</div>
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">

<div class="row">
    <!-- Widget Item -->
    <div class="col-md-12">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Edit Document</h3>
            <form action="{{url('patient/document/update')}}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="patient-id">Patient ID</label>
                        <input type="hidden" class="form-control" name="id" value="{{$patientdocumnet->id}}">
                        <input type="text" class="form-control" name="patient_id" value="{{$patientdocumnet->patient_id}}" placeholder="Patient id" id="patient-id">
                        @error('patient_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="file">Attach File</label>
                        <input type="file" name="patient_document" value="{{$patientdocumnet->patient_document}}" class="form-control" id="file">
                        @error('patient_document')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control" name="doctor_name" value="{{$patientdocumnet->doctor_name}}" placeholder="Doctor Name" id="doctor_name">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" id="description" rows="3">{{$patientdocumnet->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Widget Item -->
</div>
</div>
<!-- /Main Content -->
@endsection