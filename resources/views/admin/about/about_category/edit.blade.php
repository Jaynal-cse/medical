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
        <li class="breadcrumb-item">About Part</li>
        <li class="breadcrumb-item"><a href="{{route('footer_heading.index')}}">About Category</a></li>
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
                    <h3 class="widget-title">Edit About Category</h3>
                    <form action="{{url('about_category/update')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="about_category">About Category</label>
                                <input type="hidden" name="id" value="{{$about_category->id}}">
                                <input type="text" class="form-control" name="about_category" value="{{$about_category->about_category}}" placeholder="About Category" id="about_category">
                                @error('about_category')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" value="{{$about_category->link}}" placeholder="Link" id="link">
                                @error('link')
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
