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
            <li class="breadcrumb-item active">Frontend Part</li>
            <li class="breadcrumb-item">Top Bar</li>
            <li class="breadcrumb-item active">Frontend Top Bar Left</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mt-2">
                @if(session('added_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Done!</strong>
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

            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="widget-title">All Frontend Top Bar Left</h3>
                        </div>

                        <div class="col-md-1">
                            <a href="{{route('frontend_top_bar.create')}}" class="btn btn-sm btn-primary"><span class="ti-plus"></span>Add</a>
                        </div>
                    </div>
                    <div class="table-div">
                        <table id="table_id" class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Item</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            @php
                                $i=1;
                            @endphp
                            <tbody>
                            @foreach($frontendTopBars as $frontendTopBar)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$frontendTopBar->icon}}</td>
                                    <td>{{$frontendTopBar->item}}</td>
                                    <td class="text-center">
                                        @if($frontendTopBar->status==1)
                                            <a href="{{url('/frontend_top_bar/ChangeStatus/'.$frontendTopBar->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
                                        @else
                                            <a href="{{url('/frontend_top_bar/ChangeStatus/'.$frontendTopBar->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{route('frontend_top_bar.edit',$frontendTopBar->id)}}" type="button" class="btn btn-primary"><span class="ti-pencil-alt"></span></a>
                                            <a href="{{url('frontend_top_bar/delete')}}/{{$frontendTopBar->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
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
