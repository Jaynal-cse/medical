@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Frontend Part</h3>
</div>
<div class="col-md-6">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">
                <span class="ti-home"></span>
            </a>
        </li>
        <li class="breadcrumb-item">Frontend Part</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_banner.index')}}">Banner</a></li>
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
                    <h3 class="widget-title">Edit Banner</h3>
                    <form action="{{url('frontend_banner/update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="heading">Heading</label>
                                <input type="hidden" name="id" value="{{$banner->id}}">
                                <input type="text" class="form-control" name="heading" value="{{$banner->heading}}" placeholder="Heading" id="heading">
                                @error('heading')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="paragraph">Content</label>
                                <textarea type="text" class="form-control" name="paragraph" placeholder="Content" id="content">{{$banner->paragraph}}</textarea>
                                @error('paragraph')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="button_color">Button Color</label>
                                <input type="text" name="button_color" value="{{$banner->button_color}}" placeholder="Button Color" class="form-control" id="button_color">
                                @error('button_color')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="button_text">Button Text</label>
                                <input type="text" name="button_text" value="{{$banner->button_text}}" placeholder="Button Text" class="form-control" id="button_text">
                                @error('button_text')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="file">File</label>
                                <input type="file" name="image" value="{{$banner->image}}" class="form-control" id="file">
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
