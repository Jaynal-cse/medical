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
                           <th>Insurance-name</th>
                           <th>Service-tax <small>(%)</small></th>
                           <th>Discount <small>(%)</small></th>
                           <th>Remark</th>
                           <th>Insurance-no</th>
                           <th>Insurance-code</th>

                            <th>Disease-charge</th>
                            <th>Hospital-rate</th>
                            <th>Insurance-rate</th>
                           <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @php 
                    $serial = 1;
                 @endphp
                        @foreach($insurance_list as $insurance)
                        
                        <tr>
                        <th scope="row">{{$serial}}</th>
                        @php 
                            $insurance_calculate = 0;
                        @endphp
                        @php 
                            $serial++;
                        @endphp
                            <td>{{$insurance->insurance_name}}</td>
                            <td>{{$insurance->service_tax}}</td>
                            <td>{{$insurance->discount}}</td>
                            <td>{{$insurance->remark}}</td>
                            <td>{{$insurance->insurance_no}}</td>
                            <td>{{$insurance->insurance_code}}</td>
                            <td>{{$insurance->disease_charge}}</td>
                            <td>{{$insurance->hospital_rate}}</td>
                            <td>{{$insurance->insurance_rate}}</td>
                            @php 
                            
                            $insurance_calculate = $insurance_calculate + ($insurance->disease_charge + $insurance->hospital_rate + $insurance->insurance_rate);
                            
                            
                            @endphp
                            <td>
                           @if(isset($insurance->discount))
                            {{$insurance_calculate -(($insurance->discount/100) * $insurance_calculate)}}
                            @else
                            {{$insurance_calculate}}
                           @endif
                            </td>
                            <td>
                                <span class="badge badge-success">completed</span>
                            </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                
                <!--Export links-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center export-pagination">
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-download"></span> csv</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-printer"></span>  print</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
                        </li>
                    </ul>
                </nav>
                <!-- /Export links-->
                
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