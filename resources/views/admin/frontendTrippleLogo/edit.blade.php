@extends('layouts.dashboard')

@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{route('frontend_tripple_logo.index')}}">Frontend Tripple Logo</a></li>
            <li class="breadcrumb-item active"><span class="ti-plus"></span>Edit</li>
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
                    <h3 class="widget-title">Edit Frontend Tripple Logo</h3>
                    <form action="{{route('frontend_tripple_logo.update', $frontendTrippleLogo->id)}}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="heading">Heading</label>
                                <input type="text" class="form-control" name="heading" value="{{$frontendTrippleLogo->heading}}" placeholder="Heading" id="heading">
                                @error('heading')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="file1">Logo 1</label>
                                <input type="file" name="logo1" value="{{$frontendTrippleLogo->logo1}}" class="form-control" id="file1">
                                @error('logo1')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file2">Logo 2</label>
                                <input type="file" name="logo2" value="{{$frontendTrippleLogo->logo2}}" class="form-control" id="file2">
                                @error('logo2')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file3">Logo 3</label>
                                <input type="file" name="logo3" value="{{$frontendTrippleLogo->logo3}}" class="form-control" id="file3">
                                @error('logo3')
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
