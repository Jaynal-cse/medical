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
            <h3>Create Test Schedule</h3>
        </div>

        <div class="card-body">
            <form action="{{route('testinfo.store')}}" method="post">
                @csrf
                <div class="form-group row" style="display:none">
                    
                      
                      <input type="text" class="form-control" rel="gp"  name="appointment_id"  value="{{$CurrentFinalIdWillBe}}">

            
                          <!-- <span class="input-group-btn"><button type="button" class="btn btn-default getNewPass"><span class="ti-reload" style="padding-top: 10px;"></span></button></span> -->
                      @error('appointment_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    
                </div>
                <div class="row">
                <div class="form-group col-md-3">
                   
                   
                      <input type="text" id="mobile_search" name="phone_no" class="form-control" placeholder="Mobile Number">
                     
                   
                </div>
				 <div class="form-group col-md-3">
                    
                
                      <input type="text"   name="name" id="patientName" class="form-control" placeholder="Patient Name" >
                      
                    
                </div>
                <div class="form-group col-md-3">
                    
                   
                      <input type="text" class="form-control" name="age" id="patientAge" placeholder="Age" >
                      
                 
                </div>
                <div class="form-group col-md-3">
                 
                      <input type="text" class="form-control" name="blood_group" id="bloodGroup" placeholder="Blood Group">
                        
                    
                </div>
</div>
<div class="row">
<div class="form-group col-md-6">
                    
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
                <div class="form-group col-md-6">
                    
                      <select class="form-control schedule " id="designationappointment" name="doctor_id">
                            <option value="">-Reference Doctor--</option>
                           
                        </select>
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                   
                </div>
</div>
				
<div class="test" style="border:1px solid grey;padding:2%;border-radius:5px">	
          @for($i=0;$i<=count($depts);$i++)
             @if(isset($departmentWiseTests[$i]))
                 @foreach($depts as $dept)
                   @if( $dept->id == $i)
                   <h4 style="font-size: 15px;font-weight: 800;">{{$dept->department_name}}</h4><hr>
                   @endif
                 @endforeach
                 @foreach($departmentWiseTests[$i] as $departmenttest)
                    <div class="form-check form-check-inline">
                         <input class="form-check-input" onclick="sss({{$departmenttest->id}})" name="test_id[]"type="checkbox" id="id-{{$departmenttest->id}}" value="{{$departmenttest->id}}">
                         <label class="form-check-label" for="inlineCheckbox1">{{$departmenttest->name}}</label>
                    </div>
                @endforeach
                <br><br>
            @endif
          @endfor
</div> 
             <div class="row">
               <div class="form-group col-md-6">
                        <label for="email"><br>Total Fee
                        </label>
                       <div id="fee"> <input type="number" name="fee"    class="form-control" placeholder="Total Fee">
                        @error('fee')
                            <small class="text-danger">{{$message}}</small>
                        @enderror </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><br>Discount(%)
                        </label><div id="discountAmount">
                       
                        <select name="discount" id="discount" class="form-control">
                              <option value="">--Select Discount--</option>
                              <option value="5">Corporate Discount(5%)</option>
                              <option value="10">Employee Discount(10%)</option>
                        </select>
                        @error('discount')
                            <small class="text-danger">{{$message}}</small>
                        @enderror</div>
                </div></div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="email">After Discount
                        </label><div id="after_discount">
                        <input type="number" name="payable"  placeholder="Payable Amount" class="form-control" id="Email">
                        @error('payable')
                            <small class="text-danger">{{$message}}</small>
                        @enderror</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Advance
                        </label><div id="advanceAmount">
                        <input type="number" name="advance" onkeyup="callJavascriptFunction();"  placeholder="Advance Amount" class="form-control" ></div>
                        @error('advance')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div></div>
                    <div class="form-group col-md-12">
                        <label for="email">Due Amount
                        </label><div id="due_amount">
                        <input type="number" name="due"  placeholder="Due Amount" class="form-control" >
                        @error('due')
                            <small class="text-danger">{{$message}}</small>
                        @enderror</div>
                    </div></div>
                   
<div class="form-group row">
    <button type="submit" class="btn btn-success" style="margin-left: 38px;margin-top: -24px;">Submit</button>
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



var testString="";
function sss($id){
   
    var test = testString.includes($id);   
    if(test == false){
    testString += $id+'|';
    }else{
        testString = testString.replace($id+'|', " ") ;
    }
    var _token = $('input[name="_token"]').val();
    $.ajax({ 
                    url:"{{ route('test.data_fetch') }}",
                    method:"POST",
					data:{ testString:testString, _token:_token},
					
                    success:function(result)
                       {    
						   document.getElementById("fee").innerHTML = '<input type="number" name="fee" class="form-control" value="'+result+'">';
                           document.getElementById("after_discount").innerHTML = '<input type="number" name="payable" class="form-control" value="'+result+'">';
                           document.getElementById("due_amount").innerHTML = '<input type="number" name="due" class="form-control" value="'+result+'">';
                           document.getElementById("discount").innerHTML='<option value="">--Select Discount--</option><option value="5">Corporate Discount(5%)</option><option value="10">Employee Discount(10%)</option>';
                           document.getElementById("advanceAmount").innerHTML ='<input type="number" name="advance" onkeyup="callJavascriptFunction();"  placeholder="Advance Amount" class="form-control" >';
                        }

               })      
    


}


$('#discount').change(function(){
		   var discount = $('#discount').val();
           var fee = $('input[name=fee]').val();
           fee=((100-discount)*fee)/100;
           
           document.getElementById("after_discount").innerHTML = '<input type="number" name="payable" class="form-control" value="'+fee+'">';
            document.getElementById("due_amount").innerHTML = '<input type="number" name="due" class="form-control" value="'+fee+'">';
		    
		  });
          
          

    function callJavascriptFunction(){
    var payable = $('input[name="payable"]').val();
    var advance = $('input[name="advance"]').val();
    var due = payable-advance;
    document.getElementById("due_amount").innerHTML = '<input type="number" name="due" class="form-control" value="'+due+'">';
}
		  
</script>
@endsection