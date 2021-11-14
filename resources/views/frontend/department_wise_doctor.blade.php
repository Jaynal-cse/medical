

@extends('layouts.frontend')

@push('css')
<style>
.modal-dialog {
    max-width: 530px;
    margin: 30px auto;
}

.modal-content{
	font-size:22px;
}
.mb-2 {
    margin-bottom: 1.5rem !important;
}
.form-control {
    padding: 1.5rem .75rem;
    font-size: 13px;
    
}

select.form-control:not([size]):not([multiple]) {
    height: calc(3.25rem + 15px);
	color:grey;
}
.btn {
    
    line-height: 2.25;
    
}

textarea {
  
    color: grey !important;
}
.modal-title {
    margin-bottom: 0;
    line-height: 1.5;
    color: #007bff;
    font-weight: 800;
    
    line-height: 42px;
    letter-spacing: 3px;
    text-transform: Capitalize;
}

</style>
@endpush

@section('breadcrumb')
   <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="img/figure/figure2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>All Doctors</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>All Doctors</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection        

@section('content')
<!-- All Doctors Start Here -->
        <section class="team-wrap-layout2 bg-light-accent100">
            <div class="container">
                <div class="section-heading heading-dark text-center heading-layout4">
                    <h2>Find A Doctor</h2>
                    <p>Our find a doctor tool assists you in choosing from our diverse
                        pool of health specialists.</p>
                </div>
                <div class="isotope-wrap">
                    <div class="text-center">
                        <div class="isotope-classes-tab isotop-btn">
                            <a href="{{url('doctors')}}" class=" nav-item" data-filter="*">All</a>
							
                            @foreach($department as $dep)
							  
                                <a href="{{url('department_wise_doctor')}}/{{$dep->id}}" class="nav-item <?php if($dep->id == $dept_id){echo "current";} ?>" data-filter=".dental">{{$dep->department_name}}</a>
							  
                            @endforeach
                        </div>
                    </div>
                    <div class="row featuredContainer" id="no-equal-gallery">
                        @foreach($doctors as $doctor)
						
						
                        <div class="no-equal-item col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 gastroenterology neurology">
                            <div class="team-box-layout2">
                                <div class="item-img">
                                    <img src="{{asset('uploads/doctor/')}}/{{$doctor->image}}">
                                    <ul class="item-icon">
                                        <li><a href="single-doctor.html"><i class="fas fa-plus"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item-content">
                                    <h3 class="item-title"><a href="single-doctor.html">{{$doctor->doctor_name}}</a></h3>
                                    <p style="color: #9133998a">Fee: <span>{{$doctor->fee}}</span><br>
                                   Department: {{$doctor->rel_to_dept_table->department_name}}</p></br>
                                </div>
                                <div class="item-schedule">
                                    <ul> 
									   <?php $doctor_id=$doctor->id;   ?>
									   @foreach(App\Schedule::where('doctor_id', $doctor->id)->where('status',1)->get()  as $schedule)
                                        <li>
										    @php   
											   if( $schedule->day == 1){ $day="Friday"; }
											   elseif($schedule->day == 2){$day="Saturday";}
											   elseif($schedule->day == 3){$day="Sunday";}
											   elseif($schedule->day == 4){$day="Monday";}
											   elseif($schedule->day == 5){$day="Tuesday";}
											   elseif($schedule->day == 6){$day="Wednesday";}
											   elseif($schedule->day == 7){$day="Thursday";}
											   $d = strtotime('Next ' .$day);
											   echo date('D',$d);
										
										    @endphp
											<br><span>{{date('h:i A',strtotime($schedule->start_time))}} - {{date('h:i A',strtotime($schedule->end_time))}}</span>
										</li>
                                       
                                       @endforeach
                                    </ul>
                                    
									<button type="button" onclick="call_modal({{$doctor->id}})" class="item-btn" >
                                       MAKE AN APPOINTMENT
                                     </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
		  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
           
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            
		  
		   <br>
		    <div id="doctor_info"></div>
		    
		   <select class="form-control mb-2 mr-sm-2" id="schedule_app" name="appointment_date">
		   
			      
				  
            </select>			
		   <input type="number" class="form-control mb-2 mr-sm-2" name="phone_no" placeholder="Enter Mobile Number" id="phone_no">
		   <input type="text" class="form-control mb-2 mr-sm-2" id="name" name="name" placeholder="Patient Name" id="pwd">
		       
			  
			  
			  
			 
			  
			  
			  
			   <div class="row">
			      <div class="col-md-6">
				      <select class="form-control mb-2 mr-sm-2"id="blood_group"  name="blood_group">
			      <option selected value="">--Select Blood Group--</option>
				 
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                    </select>
				  </div>
				  <div class="col-md-6">
				  <input type="text" class="form-control mb-2 mr-sm-2" id="age" name="age" placeholder="Enter Age" id="age">
				  
				  </div>
			   </div>
			 
			 
	  
  <textarea class="form-control" rows="5" name="problem" id="problem" placeholder="Write your Problem.."></textarea>

  
	<br>
				<select class="form-control mb-2 mr-sm-2" onchange="aaaa()"   id="aaa"  name="payment">
			      
				            <option selected>--Select Payment System--</option>
                            <option value="eee">Online Payment</option>
                            <option value="bbbb">Offline Payment</option>
                            
                    </select>
					
		<div class="row" id="online_payment_method">
			      
			   </div>			 
			
         <button   style="width:100%"  onclick="addData()"  class="btn btn-primary mb-2">Submit</button>
    </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
        <!-- All Doctors End Here -->

@endsection

@section('footer_script')

<script type="text/javascript">
$current_doctor_id=$doctor_id;
function call_modal($doctor_id){
             $.ajax({
                url : "{{url('/doctor/appointment')}}" + '/' + $doctor_id ,
				type : "GET",
                dataType : "JSON",
                success: function(data){
					    
					    $('#myModal').modal('show');
						$('.modal-title').text('Appointment with Dr.'+data.doctor_name );
						$('#schedule_app').html(data.doctor_schedule);
						$('#doctor_info').html(data.doctor_id);
                        
                         
                     },
                error : function(){
                             alert($id);
                         }

             });
 	
}

function addData(){
	var operator = 0;
    var bikash =0;	
	var _token = $('input[name="_token"]').val();
	var schedule = $('#schedule_app').val();
	var phone_no = $('#phone_no').val();
	var name= $('#name').val();
	var blood_group = $('#blood_group').val();
	var age= $('#age').val();
	var problem= $('#problem').val();
	var doctor_id= $('#doctor_id').val(); 
	var selectValue = $('#aaa').val();
	if(selectValue=="eee"){
	var operator = $('#operator').val();
	var bikash = $('#bikash_number').val();
	}
	
	  
	
	
	$.ajax({ 
                    url:"{{ route('appointment.online.store') }}",
                    method:"POST",
					data:{ schedule:schedule,name:name,blood_group:blood_group,age:age,problem:problem,phone_no:phone_no,doctor_id:doctor_id,operator:operator,bikash:bikash, _token:_token},
					
                    success:function(result)
                       {   
						     $('#myModal').modal('hide');
							 
                       }

               })       
	
	
}

function aaaa(){
	  var selectValue = $('#aaa').val();
	if(selectValue=="eee"){
	document.getElementById("online_payment_method").innerHTML = '<div class="col-md-6"><select class="form-control mb-2 mr-sm-2"  id="operator" name="dgdg"><option selected value="">Select Operator</option><option value="bikash">BiKash</option><option value="rocket">Rocket</option><option value="nagod">Nagod</option></select></div><div class="col-md-6"><input type="text" class="form-control mb-2 mr-sm-2" id="bikash_number" name="bikash" placeholder="Enter Number"></div>';
     }else{
		document.getElementById("online_payment_method").innerHTML=""; 
	 }
    
}
</script>


@endsection