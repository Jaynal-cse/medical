@extends('layouts.dashboard');
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Appointment</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Appointment</a></li>
        <li class="breadcrumb-item active">Update Appointment</li>
</div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Update Appointment</h3>
        </div>

        <div class="card-body">
            <form action="{{route('test.update',$test->id)}}" method="post">
                @csrf
                @method('PUT')
                    <!-- {{ csrf_field() }} -->
                    <!-- {{ method_field('PUT')}} -->
               
                    <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="test_name">Test Name</label>
                        <input type="text" class="form-control" name="test_name" value="{{$test->name}}" placeholder="Test Name" id="department_name">
                        @error('test_name')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                <div class="form-group col-md-12">
                        <label for="department_name">Department Name</label>
                        <select name="department_id" class="form-control">
                            @foreach($departments as $department)
                              
                                 <option value="{{$department->id}}" {{($department->id == $test->department )? 'selected' : ''}} >{{$department->department_name}}</option> 

                             @endforeach
                        </select>
                        @error('department_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
               
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" placeholder="Write Description" id="description" rows="3">{{$test->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fee_name">Fee</label>
                        <input type="number" class="form-control" name="fee" value="{{$test->fee}}" placeholder="Fee" id="department_name">
                        @error('fee')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="test_name">Priority</label>
                        <input type="number" class="form-control" name="priority" value="{{$test->priority}}" placeholder="Priority" id="department_name">
                        @error('priority')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="test_name">Room No.</label>
                        <input type="text" class="form-control" name="room_no" value="{{$test->room_no}}" placeholder="Room No." id="room_no">
                        @error('room_no')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="col-md-6" style="padding-top: 38px;padding-left: 15px !important;"> 
                        <label for="">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{($test->status == 1)? 'checked': ''}}>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{($test->status == 0)? 'checked': ''}}>
                            <label class="form-check-label" for="inlineRadio2">Deactive</label>
                        </div>
                        @error('status')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>











                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                          
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </div>
                </div>           
            </form>
        </div>
    </div>
</div>



<script>
    let btnReset = document.querySelector('button');
    let inputs = document.querySelectorAll('input');
    btnClear.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
    });
</script>

@endsection