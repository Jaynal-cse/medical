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
        <li class="breadcrumb-item">Frontend</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_doctor_schedule.index')}}">Doctor Schedule Heading List</a></li>
        <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="widget-title">Edit Our Team</h3>
                    <form action="{{route('frontend_doctor_schedule.update', $frontendDoctorSchedule->id)}}" method="POST">
                    {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="heading">Heading</label>
                                <input type="text" class="form-control" name="heading" value="{{$frontendDoctorSchedule->heading}}" placeholder="Heading" id="heading">
                                @error('heading')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="sub_heading">Sub Heading</label>
                                <input type="text" class="form-control" name="sub_heading" value="{{$frontendDoctorSchedule->sub_heading}}" placeholder="Sub Heading" id="sub_heading">
                                @error('sub_heading')
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
