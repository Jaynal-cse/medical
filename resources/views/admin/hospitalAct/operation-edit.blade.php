@extends('layouts.dashboard')
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>Update Operation Report</h6>
    </div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Update Operation Report</h3>
        </div>

        <div class="card-body">
            <form action="{{url('operationEditPost')}}" method="post">
                @csrf

                <input type="hidden" name="operation_id" class="form-control" value="{{$operation->id}}">

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID *</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control"name="patient_id" value="{{$operation->patient_id}}">
                      @error('patient_id')
                            <small class="text-danger">{{$message}}</small>
                      @enderror  
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Date *</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" placeholder="Appointment Date" name="date" value="{{$operation->date}}">
                      @error('date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror  
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Title*</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Title" name="title" value="{{$operation->title}}">
                      @error('title')
                        <small class="text-danger">{{$message}}</small>
                     @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description">{{$operation->description}}</textarea>
                      @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Doctor Name *</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="doctor_name"  value="{{$operation->doctor_name}}">
                            <option value="Neuro">Select Option</option>
                            <option value="Laila">Laila</option>
                            <option value="Abul Kasem">Abul Kasem</option>
                            <option value="Rahat">Rahat</option>
                        </select>
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-7">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="Active" {{$operation->status == "Active"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="Inactive" {{$operation->status == "Inactive"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <button class="btn btn-info">Reset</button>
                            <button class="btn" style="width: 31px; border-radius: 50%; margin-top: 2px; padding-right: 5px; height: 31px; left: 67px; position: absolute;">or</button>
                            <button type="submit" class="btn btn-success" style="margin-left: 8px;">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    //for reset button
    let btnReset = document.querySelector('button');
    let inputs = document.querySelectorAll('input');
    btnClear.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
    });
</script>

@endsection