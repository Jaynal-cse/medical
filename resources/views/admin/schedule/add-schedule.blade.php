@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Add Schedule Information</h3>
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
		<li class="breadcrumb-item active">Add Schedule</li>
</div>		        
        
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Doctor Schedule</h3>
        </div>

        <div class="card-body">
            <form action="{{url('schedulePost')}}" method="post">
            @csrf

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department*</label>
                    <div class="col-sm-8">
                      <select class="form-control doctor" name="department_id">
                          <option value="">--Select Department--</option>
                            @foreach($department as $dept)
                            <option value="{{$dept->id}}">{{$dept->department_name}}</option>
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
                      <select class="form-control"  id="designationfff"name="doctor_id">
                            <option value="">--Select Doctor--</option>
                             
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
                           
							  <option value="1">Friday</option>
							  <option value="2">Saturday</option>
							  <option value="3">Sunday</option>
							  <option value="4">Monday</option>
							  <option value="5">Tuesday</option>
							  <option value="6">Wednesday</option>
							  <option value="7">Thursday</option>
							
                        </select>
                    </div>
                    @error('day')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Schedule Time *</label>
                    <div class="col-sm-4">
                      <input type="time" class="form-control" placeholder="Start Time" name="start_time">
                    </div>
                    @error('start_time')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    <div class="col-sm-4">
                      <input type="time" class="form-control" placeholder="End Time" name="end_time">
                    </div>
                    @error('end_time')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Room No. </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Room no. and Floor" name="room_no">
                    </div>
                    @error('room_no')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
				 
               
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status </label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1">
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0">
                          <label class="custom-control-label" for="customRadioInline2">Deactive</label>
                        </div>
                    </div>
                    @error('appointment_date')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">

                            <button type="submit" class="btn btn-info">Save</button>
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
	
//doctor degree dropdown list	  
	 function call_doctor(department_id){
            
              
           
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('schedule.doctor.fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {    
						   document.getElementById("designationfff").innerHTML =result ;
                       }

               })       
      }	  
	 $('.doctor').change(function(){
		     var value = $(this).val();
		     call_doctor(value);
		    
		  });	  	
	
	
});

</script>
@endsection