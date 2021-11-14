@extends('layouts.dashboard')
@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item active">Footer Opening Hours</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mt-2">
                @if(session('added_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Done!</strong> Please Check in footr opening hours list
                        {{session('added_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 mt-2">
                @if(session('edit_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Edited!</strong> Please Check in footr opening hours list.
                        {{session('edit_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>


            <div class="col-lg-12 mt-2">
                @if(session('delete_success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Successfully Deleted!</strong> Please Check in footr opening hours list
                        {{session('delete_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="widget-title">All Footer Departments</h3>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('footer_opening_hours.create')}}" class="btn btn-sm btn-primary">Add Footer Opening Hours</a>
                        </div>
                    </div>
                    <div class="table-div">
                        <table id="table_id" class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Day</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            @php
                                $i=1;
                            @endphp
                            <tbody>
                            @foreach($footer_opening_hours as $footer_opening_hour)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$footer_opening_hour->day}}</td>
                                    <td>{{$footer_opening_hour->time}}</td>
                                    <td>
                                        @if($footer_opening_hour->status==1)
                                            <a href="{{url('/footer_opening_hours/inactive/'.$footer_opening_hour->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
                                        @else
                                            <a href="{{url('/footer_opening_hours/active/'.$footer_opening_hour->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('footer_opening_hours.edit',$footer_opening_hour->id)}}" type="button" class="btn btn-primary"><span class="ti-pencil-alt"></span></a>
                                            <a href="{{url('footer_opening_hours/delete')}}/{{$footer_opening_hour->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
