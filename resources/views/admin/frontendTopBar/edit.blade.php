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
        <li class="breadcrumb-item active">Frontend Part</li>
        <li class="breadcrumb-item">Top Bar</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_top_bar.index')}}">Frontend Top Bar Left</a></li>
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
                    <h3 class="widget-title">Edit Frontend Top Bar</h3>
                    <form action="{{route('frontend_top_bar.update',$frontendTopBar->id)}}" method="POST">
                        {{method_field('PUT')}}
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon" value="{{$frontendTopBar->icon}}" placeholder="Icon" id="icon">
                                @error('icon')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="item">Item</label>
                                <input type="text" class="form-control" name="item" value="{{$frontendTopBar->item}}" placeholder="Item" id="item">
                                @error('item')
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
