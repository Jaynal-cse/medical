@extends('layouts.dashboard')
@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item active">Footer Logo</li>
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
                            <h3 class="widget-title">All Header Logo</h3>
                        </div>

                        <div class="col-md-1">
                            <a href="{{route('header-logo.create')}}" class="btn btn-sm btn-primary"><span class="ti-plus"></span>Add</a>
                        </div>
                    </div>
                    <div class="table-div">
                        <table id="table_id" class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th class="text-center">logo</th>
                                <th class="text-center">link</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            @php
                                $i=1;
                            @endphp
                            <tbody>
                            @foreach($header_logo as $header_logos)
                                <tr>
                                    <td class="text-center">{{$i++}}</td>
                                    <td class="text-center">
                                        <img src="{{asset('uploads/header_logo/')}}/{{$header_logos->logo}}" width="50" alt="">
                                    </td>
                                    <td class="text-center">{{$header_logos->link}}</td>
                                    <td class="text-center">
                                        @if($header_logos->status==1)
                                            <a href="{{url('/header-logo/ChangeStatus/'.$header_logos->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
                                            
                                        @else
                                            <a href="{{url('/header-logo/ChangeStatus/'.$header_logos->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="{{route('header-logo.edit',$header_logos->id)}}" type="button" class="btn btn-primary"><span class="ti-pencil-alt"></span></a>
                                            <a href="{{url('header-logo/delete')}}/{{$header_logos->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
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
