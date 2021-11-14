@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('bed.index')}}">Bed</a></li>
						<li class="breadcrumb-item active">View Bed</li>
					</ol>
				</div>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">View Bed</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('bed.create')}}" class="btn btn-sm btn-primary">Add Bed</a>
                                </div>
                            </div>
                
                <div class="table-responsive-sm mb-3">
                    <table id="#" class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Bed Type</th>
                                <td>{{$bed->get_bedType->bed_type}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$bed->description}}</td>
                        </tr>
                        <tr>
                            <th>Capacity</th>
                                <td>{{$bed->capacity}}</td>
                        </tr>
                        <tr>
                            <th>Charge</th>
                                <td>{{$bed->charge}}</td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection