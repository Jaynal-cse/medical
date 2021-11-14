@extends('layouts.dashboard')

@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('footer_logo.index')}}">Header Logo</a></li>
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
                    <h3 class="widget-title">Edit Header Logo</h3>
                    <form action="{{route('header-logo.update',$headerLogo->id)}}" method="POST" enctype="multipart/form-data">
                       {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" value="{{$headerLogo->link}}" placeholder="Link" id="link">
                                @error('link')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file">Logo</label>
                                <input type="file" name="logo" class="form-control" value="{{$headerLogo->logo}}" id="file">
                                @error('logo')
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
