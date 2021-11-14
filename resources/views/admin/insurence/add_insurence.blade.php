@extends('layouts.dashboard')
@section('insurence')
active
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
        <div class="card-header">
                <button class = "btn btn-primary"><a href="{{url('insurance_list')}}"><i class="fa fa-list" aria-hidden="true"></i> Insurance list</a></button>
            </div>
        </div>

        <div class="card-body">
            <form action="{{url('insurance_post')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Insurance Name *</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Insurance Name..." name="insurance_name">
                    </div>
                    @error('insurance_name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Service Tax (%)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Service Tax..." name="service_tax">
                    </div>
                    @error('service_tax')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Discount (%)</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value = "" placeholder="Discount.." name="discount">
                    </div>
                    @error('discount')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Remark</label>
                    <div class="col-sm-8">
                     <textarea name="remark" id="" cols="80" rows="5" placeholder = "Remark.."style = "border: 1px solid #E7F3ED"></textarea>
                    </div>
                    @error('remark')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Insurance No.</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Insurance No.." name="insurance_no">
                    </div>
                    @error('insurance_no')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Insurance Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Insurance code.." name="insurance_code">
                    </div>
                    @error('insurance_code')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Disease Charge</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" value = "{{$costs}}"name="disease_charge">
                    </div>
                    @error('insurance_code')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Hospital Rate</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Hospital Rate.." name="hospital_rate">
                    </div>
                    @error('insurance_no')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Insurance Rate</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Insurance Rate.." name="insurance_rate">
                    </div>
                    @error('insurance_rate')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1">
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0">
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
                          <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection