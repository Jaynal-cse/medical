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
        <li class="breadcrumb-item"><a href="{{route('footer_upper_part.index')}}">Footer Upper Part</a></li>
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
                    <h3 class="widget-title">Edit Footer Upper Part</h3>
                    <form action="{{url('footer_upper_part/update')}}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="paragraph">Content</label>
                                <input type="hidden" name="id" value="{{$FooterUpperParts->id}}">
                                <textarea class="form-control" name="paragraph" placeholder="Content" id="paragraph" rows="3">{{$FooterUpperParts->paragraph}}</textarea>
                                @error('paragraph')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon" value="{{$FooterUpperParts->icon}}" placeholder="Icon" id="icon">
                                @error('icon')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$FooterUpperParts->phone}}" placeholder="Phone" id="phone">
                                @error('phone')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="button_color">Button Color</label>
                                <input type="text" class="form-control" name="button_color" value="{{$FooterUpperParts->button_color}}" placeholder="Button Color" id="button_color">
                                @error('button_color')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="button_text">Button Text</label>
                                <input type="text" class="form-control" name="button_text" value="{{$FooterUpperParts->button_text}}" placeholder="Button Text" id="button_text">
                                @error('button_text')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="button_link">Button Link</label>
                                <input type="text" class="form-control" name="button_link" value="{{$FooterUpperParts->button_link}}" placeholder="Button Link" id="button_link">
                                @error('button_link')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="file">Image</label>
                                <input type="file" name="image" class="form-control" value="{{$FooterUpperParts->image}}" id="file">
                                @error('image')
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
