@extends('layouts.dashboard');

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
        <li class="breadcrumb-item active">All Appointments</li>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            @if(session('appointment_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('appointment_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('appointment_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('appointment_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('appointment_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('appointment_add')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>


        <!-- Widget Item -->
        <div class="col-md-12 pt-3">
            <div class="card">
                    <div class="card-header">
                        <div class="add pb-2">
                            <a href="{{url('addAppointment')}}"><button type="button" class="btn btn-success mb-0"><span aria-hidden="true">+</span> Add Appointment</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Appointment ID</th>
                                    <th>Patient ID</th>
                                    <th>Status</th>
                                    <th>Doctor Name</th>
                                    <th>Serial</th>
                                    <th>Problem</th>
                                    <th>Appointment</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($appointment as $appointments)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                        <td>{{$appointments->appointment_id}}</td>
                                        <td>{{$appointments->patient_id}}</td>
                                        <td>
									        <button id="{{$appointments->id}}"class="btn btn-basic" style="background-color:#faebd700;color:#3e5569" onclick="doctorActivationControl({{$appointments->id }})">{{($appointments->status == 1)?'Active':'Pending'}}</button> 
										</td>
                                        <td>{{$appointments->rel_to_doctor_table->doctor_name}}</td>
										<td>{{$appointments->serial}}</td>
                                        
                                        <td>{{$appointments->problem}}</td>
                                        <td>{{$appointments->appointment_date}}</td>
                                        <td>
                                            <a href="{{url('appView')}}/{{$appointments->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            
                                            <a href="{{url('appEdit')}}/{{$appointments->id}}"type="submit" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>

                                            <a href="{{url('appointmentDel')}}/{{$appointments->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach


                                    
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>

@endsection


@section('footer_script')
<script>

function doctorActivationControl($id){
	 
	          var x;
			  var appointment_id=$id;
			  
			
			  var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('appointment.activationcontroll') }}",
                    method:"POST",
					data:{ appointment_id:appointment_id,_token:_token},
					
                    success:function(result)
                       {   
					       
							myObj = JSON.parse(result);
							
							if(myObj.status == 1){document.getElementById(myObj.id).innerHTML = "Active";}
							else{document.getElementById(myObj.id).innerHTML = "Pending";}
							
                       }

               })       
}






</script>


@endsection