@extends('layouts.dashboard')

@section('breadcrumb')

    <div class="col-md-6">
        <h3 class="block-title">Hospital Activities</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Birth Register</li>
            <li class="breadcrumb-item active">Register</li>
        </ol>
    </div>

@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">
<div class="row">

    <!-- Widget Item -->
    <div class="col-md-12">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="margin-top: 20px" role="alert">
            <strong>Successfully Done!</strong> {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    
        @endif
    
        @if(session('Delete'))
        <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 20px" role="alert">
            <strong>Successfully Delete!</strong> {{session('Delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
    


        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Birth Register</h3>
            <form action="{{route('birth.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Doctor-name">New Born Id</label>
                        <input type="text" class="form-control" name="new_born_id" value="{{old('new_born_id')}}" placeholder="IM-008899" id="new_born_id">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Doctor-name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="name" id="name">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" placeholder="Date of Birth" class="form-control" id="dob">
                        @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="dob">Depertment</label>
                        <select class="form-control" name="depertment" value="{{old('depertment')}}" id="gender">
                            @foreach($deparments as $deparment)
                            <option value="{{$deparment->department_name}}">{{$deparment->department_name}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="depertment" value="{{old('depertment')}}" placeholder="Depertment" class="form-control" id="dob"> -->
                        @error('depertment')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="specialization">Specialization</label>
                        <input type="text" name="specialization" value="{{old('specialization')}}" placeholder="Specialization" class="form-control" id="specialization">
                        @error('specialization')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="experience">Experience</label>
                        <input type="text" name="experience" value="{{old('experience')}}" placeholder="Experience" class="form-control" id="experience">
                        @error('experience')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="age">Age</label>
                        <input type="text" name="age" value="{{old('age')}}" placeholder="Age" class="form-control" id="age">
                        @error('age')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Phone" class="form-control" id="phone">
                        @error('phone_number')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{old('email')}}" placeholder="email" class="form-control" id="Email">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" value="{{old('gender')}}" id="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="about-doctor">Doctor Details</label>
                        <textarea placeholder="Doctor Details" name="doctor_details" value="{{old('doctor_details')}}" class="form-control" id="about-doctor" rows="3"></textarea>
                        @error('doctor_details')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea placeholder="Address" name="address" value="{{old('address')}}" class="form-control" id="address" rows="3"></textarea>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="starting_time">Starting Time</label>
                        <input type="time" name="starting_time" value="{{old('starting_time')}}" placeholder="starting time" class="form-control" id="starting_time">
                        @error('starting_time')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ending_time">Ending Time</label>
                        <input type="time" name="ending_time" value="{{old('ending_time')}}" placeholder="ending time" class="form-control" id="ending_time">
                        @error('ending_time')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                        <div class="form-group col-md-6">
                        <label for="">Working Days</label><br>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Sun">
                            <label for="checkbox2" class="p-1 mt-2">Sun</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Mon">
                            <label for="checkbox2" class="p-1 mt-2">Mon</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Tue">
                            <label for="checkbox2" class="p-1 mt-2">Tue</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Wed">
                            <label for="checkbox2" class="p-1 mt-2">Wed</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Thur">
                            <label for="checkbox2" class="p-1 mt-2">Thur</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Fri">
                            <label for="checkbox2" class="p-1 mt-2">Fri</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Sat">
                            <label for="checkbox2" class="p-1 mt-2">Sat</label>
                            </div>
                        </div>

                    <div class="form-group col-md-12">
                        <label for="file">File</label>
                        <input type="file" name="image" class="form-control" value="{{old('image')}}" id="file">
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