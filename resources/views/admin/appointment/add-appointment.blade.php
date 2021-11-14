@extends('layouts.dashboard')
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
        <li class="breadcrumb-item active">Add Appointment</li>
</div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Add Appointment</h3>
        </div>

        <div class="card-body">
            <form action="{{url('appointmentPost')}}" method="post">
                @csrf
                <div class="form-group row" style="display:none">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Appointment Id *</label>
                    <div class="col-sm-8">
                      
                      <input type="text" class="form-control" rel="gp"  name="appointment_id"  value="{{$CurrentFinalIdWillBe}}">

            
                          <!-- <span class="input-group-btn"><button type="button" class="btn btn-default getNewPass"><span class="ti-reload" style="padding-top: 10px;"></span></button></span> -->
                      @error('appointment_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Mobile No.*</label>
                    <div class="col-sm-8">
                      <input type="text" id="mobile_search" name="phone_no" class="form-control" placeholder="Mobile Number">
                     
                    </div>
                </div>
				 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Patient Name*</label>
                    <div class="col-sm-8">
                      <input type="text"   name="name" id="patientName" class="form-control" placeholder="Patient Name" >
                      
                    </div>
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Age*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="age" id="patientAge" placeholder="Age" >
                      
                    </div>
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Blood*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="blood_group" id="bloodGroup" placeholder="Blood Group">
                        
                    </div>
                </div>
				
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department*</label>
                    <div class="col-sm-8">
                      <select class="form-control doctor" >
                            <option value="">--Select Department--</option>
                            @foreach($depts as $dept)
                            <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                           @endforeach
                        </select>
                         @error('department')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Doctor*</label>
                    <div class="col-sm-8">
                      <select class="form-control schedule " id="designationappointment" name="doctor_id">
                            <option value="">--Select Doctor--</option>
                           
                        </select>
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Appointment*</label>
                    <div class="col-sm-8">
                      <select class="form-control serial" id="scheduleappointment" name="appointment_date">
                            <option value="">--Select Schedule--</option>
                            
                        </select>
                        @error('schedule')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Problem </label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Problem" name="problem"></textarea>
                      @error('problem')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>
              
                <div class="form-group row">
                
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                           
                            
                            <button type="submit" class="btn btn-success" style="margin-left: 8px;">Save</button>
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
function call_doctor(department_id){
            
              
           
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('doctor.data_fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {    
						   document.getElementById("designationappointment").innerHTML =result ;
                       }

               })       
      }	  
	 $('.doctor').change(function(){
		     var value = $(this).val();
		     call_doctor(value);
		    
		  });	
		  
		  
		  
function call_schedule(doctor_id){
            
              
           
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('schedule.data_fetch') }}",
                    method:"POST",
					data:{ doctor_id:doctor_id, _token:_token},
					
                    success:function(result)
                       {   
						   document.getElementById("scheduleappointment").innerHTML =result ;
                       }

               })       
      }	  
	 $('.schedule').change(function(){
		     var value = $(this).val();
			 
		     call_schedule(value);
		    
		  });	  		  
 
		  		  

</script>
<script type="text/javascript">

 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
		$( "#mobile_search" ).autocomplete({
				source: function( request, response ) {
				  // Fetch data
				  $.ajax({
					url:"{{route('appointment.getMobile')}}",
					type: 'post',
					dataType: "json",
					data: {
					   _token: CSRF_TOKEN,
					   search: request.term
					},
					success: function( data ) {
						
					  response( data );
					}
				  });
				},
				select: function (event,ui){
				  
				$('#employee_search').val(ui.item.value);
				$('#patientName').val(ui.item.name);
				$('#patientAge').val(ui.item.age);
				$('#bloodGroup').val(ui.item.blood_group);
               							 
				 
				}
				
			  });
});
</script>
@endsection