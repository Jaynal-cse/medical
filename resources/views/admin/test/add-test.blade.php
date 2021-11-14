@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="index.html">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('department.index')}}">Test</a></li>
						<li class="breadcrumb-item active">Add Test</li>
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
            <h3 class="widget-title">Add Test</h3>
            <form action="{{route('test.store')}}" method="POST">
                @csrf
                <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="test_name">Test Name</label>
                        <input type="text" class="form-control" name="test_name" value="{{old('test_name')}}" placeholder="Test Name" id="department_name">
                        @error('test_name')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                <div class="form-group col-md-12">
                        <label for="department_name">Department Name</label>
                        <select name="department_id" class="form-control">
                              <option value=""> --Select Department--</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                        </select>
                        @error('department_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
               
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" placeholder="Write Description" id="description" rows="3"></textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fee_name">Fee</label>
                        <input type="number" class="form-control" name="fee" value="{{old('test_name')}}" placeholder="Fee" id="department_name">
                        @error('fee')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="test_name">Priority</label>
                        <input type="number" class="form-control" name="priority" value="{{old('test_name')}}" placeholder="Priority" id="department_name">
                        @error('priority')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="test_name">Room No.</label>
                        <input type="text" class="form-control" name="room_no"  placeholder="Room No." id="room_no">
                        @error('room_no')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="col-md-6" style="padding-top: 38px;padding-left: 15px !important;"> 
                        <label for="">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Deactive</label>
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