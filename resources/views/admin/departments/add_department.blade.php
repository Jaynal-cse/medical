@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('department.index')}}">Department</a></li>
						<li class="breadcrumb-item active">Add Department</li>
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
            <h3 class="widget-title">Add Department</h3>
            <form action="{{route('department.store')}}" method="POST">
                @csrf
                <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" name="department_name" value="{{old('department_name')}}" placeholder="Department Name" id="department_name">
                        @error('department_name')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" id="description" rows="3">{{old('description')}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0">
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1">
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                        @error('status')
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