@extends('layouts.dashboard');
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Appointment</h3>
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
        <li class="breadcrumb-item active">Update Appointment</li>
</div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Update Appointment</h3>
        </div>

        <div class="card-body">
            <form action="{{url('appEditPost')}}" method="post">
                @csrf
                    <!-- {{ csrf_field() }} -->
                    <!-- {{ method_field('PUT')}} -->
                <input type="hidden" name="appointment_id" class="form-control" value="{{$app_edit->id}}">
                        
                <div class="form-group row">
                    <!-- <input type="hidden" name="appointment_id"> -->
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Patient ID" name="patient_id" value="{{$app_edit->patient_id}}">
                    </div>
                    @error('patient_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department Name *</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="department" value="{{$app_edit->department}}">
                            <option value="">Select Option</option>
                            @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    @error('department')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Doctor Name *</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="doctor_name" value="{{$app_edit->doctor_name}}">
                            <option value="">Select Option</option>
                            @foreach($doctor as $doct)
                            <option value="{{$doct->id}}">{{$doct->doctor_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    @error('doctor_name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Appointment Date *</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" placeholder="Appointment Date" name="appointment_date" value="{{$app_edit->appointment_date}}">
                    </div>
                    @error('appointment_date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Serial No. *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Serial No." name="serial"  value="{{$app_edit->serial}}">
                    </div>
                    @error('serial')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Problem *</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Problem" name="problem">{{$app_edit->problem}}</textarea>
                          @error('problem')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>    
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="Active" {{$app_edit->status == "Active"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="Inactive" {{$app_edit->status == "Inactive"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                    @error('appointment_date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                          <button class="btn btn-info">Reset</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </div>           
            </form>
        </div>
    </div>
</div>



<script>
    let btnReset = document.querySelector('button');
    let inputs = document.querySelectorAll('input');
    btnClear.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
    });
</script>

@endsection