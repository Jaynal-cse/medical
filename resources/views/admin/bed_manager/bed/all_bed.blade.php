@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Bed</li>
					</ol>
				</div>
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">

    <div class="row">
                        <div class="col-lg-12 mt-2">
                        @if(session('added_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully Added!</strong> Please Check in Bed List.
                            {{session('added_success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>
                        @endif
                        </div>

                        <div class="col-lg-12 mt-2">
                        @if(session('edit_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Successfully Edited!</strong> Please Check in Bed List.
                            {{session('edit_success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>
                        @endif
                        </div>
                        
                        <div class="col-lg-12 mt-2">
                        @if(session('delete_success'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Successfully Deleted!</strong> Please Check in Bed List.
                            {{session('delete_success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                            </div>
                        @endif
                        </div>
            <!-- Widget Item -->
            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">All Bed</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('bed.create')}}" class="btn btn-sm btn-primary">Add Bed</a>
                                </div>
                            <div class="table-responsive-sm mb-3 col-md-12">
                                <table id="table_id" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Bed Type</th>
                                            <th>Description</th>
                                            <th>Capacity</th>
                                            <th>Charge</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    @php
                                    $i=1;
                                    @endphp
                                    <tbody>
                                        @foreach($beds as $bed)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$bed->get_bedType->bed_type}}</td>
                                            <td>{{$bed->description}}</td>
                                            <td>{{$bed->capacity}}</td>
                                            <td>{{$bed->charge}}</td>
                                            <td>
											@if($bed->status==1)
        									<a href="{{url('/bed/inactive/'.$bed->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
       										 @else
        									<a href="{{url('/bed/active/'.$bed->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
        									@endif
											</td>
                                            <td>
                                                <div class="btn-group">
												<a href="{{route('bed.show',$bed->id)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a> 
												<a href="{{route('bed.edit',$bed->id)}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span></button></a>
												<a href="{{url('bed/delete')}}/{{$bed->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
												</div>
                                            </td>
                                            <!-- <td>
                                                <span class="badge badge-success">Available</span>
                                            </td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
            </div>
        <!-- /Widget Item -->
    </div>
</div>
<!-- /Main Content -->

@endsection