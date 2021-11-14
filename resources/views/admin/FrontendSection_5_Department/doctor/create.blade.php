@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Frontend Part</h3>
</div>
<div class="col-md-6">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}">
                <span class="ti-home"></span>
            </a>
        </li>
        <li class="breadcrumb-item active">Service</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_doctor.index')}}">Frontend Doctor</a></li>
        <li class="breadcrumb-item active">Add</li>
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
                    <h3 class="widget-title">Add Frontend Doctor</h3>
                    <form action="{{route('frontend_doctor.store')}}" method="POST">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="service_name_id">Service</label>
                                <select class="form-control" name="service_name_id" id="service_name_id">
                                    <option value="">Select</option>
                                    @foreach($service as $key=> $services)
                                        <option value="{{$services->id}}">{{$services->service_name}}</option>
                                    @endforeach
                                </select>
                                @error('service_name_id')
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


                            <div class="form-group col-md-12 mb-3">
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
