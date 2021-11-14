@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>Birth Report</h6>
    </div>


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Add Birth Report</h3>
        </div>

        <div class="card-body">
            <form action="{{url('birthPost')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID *</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Patient ID" name="patient_id">
                      @error('patient_id')
                            <small class="text-danger">{{$message}}</small>
                      @enderror  
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Date *</label>
                    <div class="col-sm-7">
                      <input type="date" class="form-control" placeholder="Appointment Date" name="date">
                      @error('date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror  
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Title*</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Title" name="title">
                      @error('title')
                        <small class="text-danger">{{$message}}</small>
                     @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Description" name="description"></textarea>
                      @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Doctor Name *</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="doctor_name">
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
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="Active">
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="Inactive">
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
                            <button type="submit" class="btn btn-success" style="margin-left: 8px;">Save</button>
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