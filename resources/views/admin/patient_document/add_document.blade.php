@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('patient.index')}}">Document</a></li>
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
            <h3 class="widget-title">Add Document</h3>
            <form action="{{route('patient_document.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="patient-id">Patient ID</label>
                        <input type="text" class="form-control" name="patient_id" value="{{old('patient_id')}}" placeholder="Patient id" id="patient-id">
                        @error('patient_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="file">Attach File</label>
                        <input type="file" name="patient_document" value="{{old('patient_document')}}" class="form-control" id="file">
                        @error('patient_document')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="doctor_name">Doctor Name</label>
                        <input type="text" class="form-control" name="doctor_name" value="{{old('doctor_name')}}" placeholder="Doctor Name" id="doctor_name">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" value="{{old('description')}}" class="form-control" id="description" rows="3"></textarea>
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