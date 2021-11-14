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
        <li class="breadcrumb-item">Footer</li>
        <li class="breadcrumb-item"><a href="{{route('footer_logo_item.index')}}">Footer Logo Item</a></li>
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
                    <h3 class="widget-title">Edit Footer Logo Item</h3>
                    <form action="{{route('footer_logo_item.update',$footerLogoItem->id)}}" method="POST" enctype="multipart/form-data">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="paragraph">Content</label>
                                <textarea type="text" class="form-control" name="paragraph" placeholder="Content" id="paragraph">{{$footerLogoItem->paragraph}}</textarea>
                                @error('paragraph')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" value="{{$footerLogoItem->location}}" placeholder="Location" id="location">
                                @error('location')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$footerLogoItem->phone}}" placeholder="Phone" id="phone">
                                @error('phone')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$footerLogoItem->email}}" placeholder="Email" id="email">
                                @error('email')
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
