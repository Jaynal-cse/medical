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
        <li class="breadcrumb-item"><a href="{{route('footer_heading_item.index')}}">Footer Heading Item</a></li>
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
                    <h3 class="widget-title">Edit Footer Heading Item</h3>
                    <form action="{{route('footer_heading_item.update',$footerHeadingItem->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="heading_id">Heading</label>
                                <select class="form-control" name="heading_id" id="heading_id">
                                    <option value="">Select</option>
                                    @foreach($FooterHeadings as $FooterHeading)
                                        <option value="{{$FooterHeading->id}}">{{$FooterHeading->heading}}</option>
                                    @endforeach
                                </select>
                                @error('heading_id')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="heading_item">Heading Item</label>
                                <input type="text" class="form-control" name="heading_item" value="{{$footerHeadingItem->heading_item}}" placeholder="Heading Item" id="heading_item">
                                @error('heading_item')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" value="{{$footerHeadingItem->link}}" placeholder="Link" id="link">
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
