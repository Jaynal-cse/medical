@extends('layouts.dashboard')

@section('breadcrumb')
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{url('about/offer/index')}}">About Offer</a></li>
            <li class="breadcrumb-item active">Add Offer</li>
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
                    <h3 class="widget-title">Add Offer</h3>
                    <form action="{{url('about/offer/store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            
                            <div class="form-group col-md-12">
                                <label for="file">File</label>
                                <input type="file" name="image" value="{{old('image')}}" class="form-control" id="file">
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
