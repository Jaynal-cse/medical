@extends('layouts.dashboard')

@section('content')

<!-- Main Content -->
<div class="container-fluid">

<div class="row">
    <!-- Widget Item -->
    <div class="col-md-12">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Add Patient</h3>
            <form action="{{route('patient.update',$patient->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
                @csrf
                
                <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="patient-id">Patient ID</label>
                        <input type="text" class="form-control" name="patient_id" value="{{$patient->patient_id}}" placeholder="Patient id" id="patient-id">
                        @error('patient_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{$patient->first_name}}" placeholder="First Name" id="first_name">
                        @error('first_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" value="{{$patient->last_name}}" placeholder="Last Name" class="form-control" id="last_name">
                        @error('last_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value="{{$patient->email}}" placeholder="Email Address" class="form-control" id="email">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone_no">Phone No</label>
                        <input type="text" name="phone_no" value="{{$patient->phone_no}}" placeholder="Phone No" class="form-control" id="phone_no">
                        @error('phone_no')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="mobile_no">Mobile No</label>
                        <input type="text" name="mobile_no" value="{{$patient->mobile_no}}" placeholder="Mobile No" class="form-control" id="mobile_no">
                        @error('mobile_no')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control" name="blood_group" value="{{$patient->blood_group}}" id="blood_group">
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        @error('blood_group')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male" {{$patient->sex == "Male" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female" {{$patient->sex == "Female" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio3" value="Other" {{$patient->sex == "Other" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                        @error('sex')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{$patient->date_of_birth}}" placeholder="Date of Birth" class="form-control" id="dob">
                        @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea placeholder="Address" name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$patient->address}}</textarea>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" {{$patient->status == "0" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" {{$patient->status == "1" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                        @error('status')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="file">File</label>
                        <input type="file" name="image" value="{{$patient->image}}" class="form-control" id="file">
                        @error('image')
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