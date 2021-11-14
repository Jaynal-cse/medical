@extends('layouts.dashboard')

@section('content')
<!-- Main Content -->
<div class="container-fluid">

<div class="row">
    <!-- Widget Item -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <button class = "btn btn-primary"><a href="{{url('insurence')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Insurance</a></button>
            </div>
            <div class="card-body">
            <div class="widget-area-2 proclinic-box-shadow">
            
            <div class="table-responsive mb-3">
                <table id="table_id" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Se no.</th>
                           <th>Patient-id</th>
                           <th>Room-no</th>
                           <th>Consultant-name</th>
                           <th>Policy-name</th>
                           <th>Policy-no</th>
                           <th>Policy-holder-name</th>
                           <th>Insurance-name</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @php 
                    $serial = 1;
                 @endphp
                        @foreach($limit_approval as $limitapproval)
                        
                        <tr>
                        <th scope="row">{{$serial}}</th>
                        
                        @php 
                            $serial++;
                        @endphp
                            <td>{{$limitapproval->patient_id}}</td>
                            <td>{{$limitapproval->room_no}}</td>
                            <td>{{$limitapproval->consultant_name}}</td>
                            <td>{{$limitapproval->policy_name}}</td>
                            <td>{{$limitapproval->policy_no}}</td>
                            <td>{{$limitapproval->policy_holder_name}}</td>
                            <td>{{$limitapproval->insurance_name}}</td>
                            <td>
                            
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                
                
                
            </div>
        </div>
            </div>
        </div>
        
    </div>
    <!-- /Widget Item -->
</div>
</div>
<!-- /Main Content -->
</div>
@endsection