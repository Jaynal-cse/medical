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
        <li class="breadcrumb-item">Logo</li>
        <li class="breadcrumb-item"><a href="{{route('footer_logo.index')}}">Header & Footer Logo</a></li>
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
                    <h3 class="widget-title">Add Footer Logo</h3>
                    <form action="{{route('footer_logo.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="file">Logo</label>
                                <input type="file" name="logo" class="form-control" value="{{old('logo')}}" id="file">
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
