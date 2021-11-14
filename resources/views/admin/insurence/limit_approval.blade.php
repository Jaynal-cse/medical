@extends('layouts.dashboard')
@section('insurence')
active
@endsection


@section('content')
<div class="container-fluid pt-3">
@if(session('approve_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('approve_success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
    <div class="card">
        <div class="card-header">
        <div class="card-header">
                <button class = "btn btn-primary"><a href="{{url('insurance_list')}}"><i class="fa fa-list" aria-hidden="true"></i> Limit Approval list</a></button>
            </div>
        </div>

        <div class="card-body">
            <form action="{{url('limit_approvalpost')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient ID</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "patient_id" placeholder="Patient ID..." name="insurance_name">
                    </div>
                    @error('patient_id')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Room no.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "room_no" placeholder="Room no..." name="service_tax">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Consultant Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "consultant_name" placeholder="Consultant Name.." name="discount">
                    </div>
                    
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Policy name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "policy_name" placeholder="Policy name.." name="insurance_no">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Policy no.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "policy_no" placeholder="Policy no.." name="insurance_code">
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Policy Holder name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name = "policy_holder_name" placeholder = "Policy Holder name...">
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Insurance Name</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="insurance_name" id="recipient-name">
                    <option value="">--Insurance select--</option>
                    @foreach($insurance_approval as $insurance)
                    <option value="{{$insurance->insurance_name}}">{{$insurance->insurance_name}}</option>
                    @endforeach
                    </select>
                    </div>
                    @error('insurance_name')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="active">
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="inactive">
                          <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                    @error('status')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection