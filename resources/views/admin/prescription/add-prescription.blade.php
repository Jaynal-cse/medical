@extends('layouts.dashboard');
@section('product')
active
@endsection

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
            <li class="breadcrumb-item">Add Prescription</li>
        </ol>
    </div>
@endsection


@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Add Prescription</h3>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Widget Item -->
                <div class="col-md-12">
                    <div class="">
                        <form action="{{url('prescriptionPost')}}" method="post">
                         @csrf   

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="department">Department</label>
                                    <select class="form-control" name="department">
                                        <option>Neuro</option>
                                        <option>Ortho</option>
                                        <option>General</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="doctor-name">Doctor Name</label>
                                    <input type="text" placeholder="Doctor Name" class="form-control" name="doctor_name" value="{{old('doctor_name')}}">
                                    @error('doctor_name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="patient-name">Patient Name</label>
                                    <input type="text" class="form-control" placeholder="Patient Name" name="patient_name" value="{{old('patient_name')}}">
                                    @error('patient_name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="patient-name">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{old('address')}}">
                                    @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label for="problem">Problem</label>
                                    <textarea placeholder="Problem" class="form-control" name="problem" rows="3" value="{{old('problem')}}"></textarea>
                                    @error('problem')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="problem">Prescription</label>
                                    <textarea placeholder="Prescription" class="form-control" name="prescription" rows="3" value="{{old('prescription')}}"></textarea>
                                    @error('prescription')
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
    </div>
</div>
@endsection