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
        <li class="breadcrumb-item"><a href="{{route('footer_bottom_icon.index')}}">Footer Bottom and Top Bar Icon</a></li>
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
                    <h3 class="widget-title">Add Footer Bottom and Top Bar Icon</h3>
                    <form action="{{route('footer_bottom_icon.store')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" name="icon" value="{{old('icon')}}" placeholder="Icon" id="icon">
                                @error('icon')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="link">Link</label>
                                <input type="text" class="form-control" name="link" value="{{old('link')}}" placeholder="Link" id="link">
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
