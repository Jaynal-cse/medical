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
        <li class="breadcrumb-item">Frontend Part</li>
        <li class="breadcrumb-item active">Banner</li>
    </ol>
</div>
@endsection

@section('content')

    <!-- Main Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mt-2">
                @if(session('added_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Added!</strong>
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
                        <strong>Successfully Edited!</strong>
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
                        <strong>Successfully Deleted!</strong>
                        {{session('delete_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="widget-title">All Banner</h3>
                        </div>

                        <div class="col-md-2">
                            <a href="{{route('frontend_banner.create')}}" class="btn btn-sm btn-primary"><span class="ti-plus"></span>Add</a>
                        </div>
                        <div class="table-responsive-sm mb-3 col-md-12">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Heading</th>
                                    <th>Content</th>
                                    <th>Button Color</th>
                                    <th>Button Text</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                @php
                                    $i=1;
                                @endphp
                                <tbody>
                                @foreach($frontend_banners as $frontend_banner)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$frontend_banner->heading}}</td>
                                        <td>{{$frontend_banner->paragraph}}</td>
                                        <td>{{$frontend_banner->button_color}}</td>
                                        <td>{{$frontend_banner->button_text}}</td>
                                        <td><img src="{{asset('uploads/banner_photo/')}}/{{$frontend_banner->image}}" width="50" alt=""></td>
                                        <td>
                                            @if($frontend_banner->status==1)
                                                <a href="{{url('/frontend_banner/active/'.$frontend_banner->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
                                            @else
                                                <a href="{{url('/frontend_banner/inactive/'.$frontend_banner->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{url('frontend_banner/edit')}}/{{$frontend_banner->id}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span></button></a>
                                                <a href="{{url('frontend_banner/delete')}}/{{$frontend_banner->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
                                            </div>
                                        </td>
                                        <!-- <td>
                                            <span class="badge badge-success">Available</span>
                                        </td> -->
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Widget Item -->
            </div>
        </div>
        <!-- /Main Content -->

@endsection
