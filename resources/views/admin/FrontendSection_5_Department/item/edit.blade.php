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
        <li class="breadcrumb-item">Frontend</li>
        <li class="breadcrumb-item">Service</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_department.index')}}">Our Services</a></li>
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
                    <h3 class="widget-title">Edit Our Services</h3>
         
         
                    <form action="{{ route('frontend_department.update', $frontendDepartment->id)}}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">

                        <div class="form-group col-md-6">
                                <label for="service_name">Service Name</label>
                                <input type="text" class="form-control" name="service_name" value="{{$frontendDepartment->service_name}}" placeholder="Service Name" id="service_name">
                                @error('service_name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="service_name_link">Service Name Link</label>
                                <input type="text" class="form-control" name="service_name_link" value="{{$frontendDepartment->service_name_link}}" placeholder="Service Name Link" id="service_name_link">
                                @error('service_name_link')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea placeholder="Description" name="description" class="form-control" id="description" rows="3">{{$frontendDepartment->description}}</textarea>
                                @error('description')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon" value="{{$frontendDepartment->icon}}" placeholder="Icon" id="icon">
                                @error('icon')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" value="{{$frontendDepartment->sub_title}}" placeholder="Sub Title" id="sub_title">
                                @error('sub_title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="in_picture_button_text">In picture Button Text</label>
                                <input type="text" class="form-control" name="in_picture_button_text" value="{{$frontendDepartment->in_picture_button_text}}" placeholder="In picture Button Text" id="in_picture_button_text">
                                @error('in_picture_button_text')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="in_picture_button_link">In picture Button Link</label>
                                <input type="text" class="form-control" name="in_picture_button_link" value="{{$frontendDepartment->in_picture_button_link}}" placeholder="In picture Button Link" id="in_picture_button_link">
                                @error('in_picture_button_link')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" name="price" value="{{$frontendDepartment->price}}" placeholder="Price" id="price">
                                @error('price')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="file">Image</label>
                                <input type="file" name="image" class="form-control" value="{{$frontendDepartment->image}}" id="file">
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
