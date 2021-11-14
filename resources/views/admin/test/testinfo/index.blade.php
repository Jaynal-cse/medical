@extends('layouts.dashboard');

@section('breadcrumb') 

<div class="col-md-6">
    <h3 class="block-title">Diagonosis</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Diagonosis</a></li>
        <li class="breadcrumb-item active">All Diagonosis</li>
</div>
@endsection

@section('content')
<style>

</style>
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

            @if(session('test_add'))
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
                            <a href="{{route('testinfo.create')}}"><button type="button" class="btn btn-success mb-0"><span aria-hidden="true">+</span> Add Diagonosis</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Test-Id</th>
                                    <th>Patient-Id</th>
                                    <th>Phone</th>
                                    <th>Amount</th>
                                    <th>Advane</th>
                                    <th>Due</th>
                                    <th>Delivar Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($testinfos as $appointments)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                        <td>{{$appointments->test_id}}</td>
                                        <td>{{$appointments->patient_id}}</td>
                                        <td>{{$appointments->phone_no}}</td>
										<td>{{$appointments->amount}}</td>
                                        <td>{{$appointments->advance}}</td>
                                        <td><?php echo $appointments->amount - $appointments->advance ?></td>
                                        <td>{{$appointments->deliver_date}}</td>
                                        <td >
                                            <a  style="font-size:9px" href="{{url('appView')}}/{{$appointments->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            <a  style="font-size:9px" href="{{route('test.invoice',$appointments->id)}}"type="submit" title="Invoice" name="button" class="btn btn-info mt-0 mb-0"><i class="fas fa-receipt"></i></a>
                                            
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