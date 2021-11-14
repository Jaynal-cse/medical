@extends('layouts.dashboard')

@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('footer_opening_hours.index')}}">Footer Opening Hours</a></li>
            <li class="breadcrumb-item active">Edit footer opening hour</li>
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
                    <h3 class="widget-title">Edit Footer Opening Hour</h3>
                    <form action="{{route('footer_opening_hours.update',$footerOpeningHour->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="day">Department Name</label>
                                <input type="text" class="form-control" name="day" value="{{$footerOpeningHour->day}}" placeholder="Day" id="day">
                                @error('day')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="time">Time</label>
                                <input type="text" class="form-control" name="time" value="{{$footerOpeningHour->time}}" placeholder="Time" id="time">
                                @error('time')
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
