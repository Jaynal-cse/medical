@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
	<h3 class="block-title">Update Schedule Information</h3>
</div>
<div class="col-md-6">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{url('home')}}">
					<span class="ti-home"></span>
				</a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Schedule</a></li>
		<li class="breadcrumb-item active">Update Schedule</li>
</div>
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Update Schedule</h3>
        </div>

        <div class="card-body">
            <form action="{{url('scheduleEditPost')}}" method="post">
            @csrf
                <input type="hidden" name="schedule_id" class="form-control" value="{{$schedule_edits->id}}">
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department*</label>
                    <div class="col-sm-8">
                      <select class="form-control dynamic" name="department_id">
                          <option value="">--Select Department--</option>
                            @foreach($department as $dept)
                            <option   {{$schedule_edits->department_id == $dept->id ? 'selected': ''}}    value="{{$dept->id}}">{{$dept->department_name}}</option>
                           @endforeach
                       </select>    
                    </div>
                    @error('department')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Doctor*</label>
                    <div class="col-sm-8">
                      <select class="form-control" id="doctorEdit" name="doctor_id" value="{{$schedule_edits->doctor_name}}">
                            <option value="">--Select Doctor--</option>
                             @foreach($doctors as $doct)
                            <option {{$schedule_edits->doctor_id == $doct->id ? 'selected': ''}} value="{{$doct->id}}">{{$doct->doctor_name}}</option>
                           @endforeach
                        </select>
                    </div>
                    @error('doctor_name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Day*</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="day">
					        <option value="">--Select Day--</option>
                            
							
							   <option value="1" {{$schedule_edits->day == 1 ? 'selected': ''}} >Friday</option>
							  <option value="2" {{$schedule_edits->day == 2 ? 'selected': ''}}>Saturday</option>
							  <option value="3" {{$schedule_edits->day == 3 ? 'selected': ''}}>Sunday</option>
							  <option value="4" {{$schedule_edits->day == 4 ? 'selected': ''}}>Monday</option>
							  <option value="5" {{$schedule_edits->day == 5 ? 'selected': ''}}>Tuesday</option>
							  <option value="6" {{$schedule_edits->day == 6 ? 'selected': ''}}>Wednesday</option>
							  <option value="7" {{$schedule_edits->day == 7 ? 'selected': ''}}>Thursday</option>
							
                        </select>
                    </div>
                    @error('day')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Schedule Time *</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control"  name="start_time" value="{{$schedule_edits->start_time}}">
                    </div>
                    @error('start_time')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="col-sm-4">
                      <input type="time" class="form-control"  name="end_time" value="{{$schedule_edits->end_time}}">
                    </div>
                    @error('end_time')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Room No. </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Room no. and Floor" name="room_no" value="{{$schedule_edits->room_no}}">
                    </div>
                    @error('room_no')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
				
				
               
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1" {{$schedule_edits->status == "1"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0" {{$schedule_edits->status == "0"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                    @error('appointment_date')
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

@section('footer_script')
<script>
$(document).ready(function(){ 
    //add doctor dropdown 
    function call_designation(department_id){
            
              
              
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('schedule.doctor.fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {   
						   document.getElementById("doctorEdit").innerHTML =result ;
                       }

               })       
      }
	   
	   
	
	  
	  
	  $('.dynamic').change(function(){
		     var value = $(this).val();
			 
		     call_designation(value);
		  });
		  
	 });
	  
</script>
@endsection