@extends('layouts.dashboard')
@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">All Bed Type</li>
					</ol>
				</div>
@endsection

@section('content')



<!--Insert Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bed Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('bed_type.store')}}" method="post">
                @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="">Bed Type</label>
                            <input type="text" class="form-control" name="bed_type" aria-describedby="emailHelp" value="{{old('bed_type')}}" placeholder="Enter Bed Type">
                            @error('bed_type')
                            <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Insert Modal -->





<div class="container-fluid">

        <div class="row">
                            <div class="col-lg-12 mt-2">
                            @if(session('insert_bed_type_success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Bed Type Added Successfully!</strong>
                                {{session('insert_bed_type_success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                                </div>
                            @endif
                            </div>


                                <div class="col-lg-12 mt-2">
                                @if(session('bed_type_update_success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong> Bed Type Successfully Updated!</strong>
                                    {{session('bed_type_update_success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                @endif
                                </div>

                                <div class="col-lg-12 mt-2">
                                @if(session('bed_type_delete_success'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong> Bed Type Successfully Deleted!</strong>
                                    {{session('bed_type_delete_success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                    </button>
                                    </div>
                                @endif
                                </div>

					<div class="col-md-12">
						<div class="widget-area-2 proclinic-box-shadow">
							<div class="row">
                                <div class="col-md-10">
                                    <h3 class="widget-title">All Bed Type</h3>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
 								    Add Bed Type
								    </button>
                                </div>
                        	</div>
							<div class="table-div">
								<table id="table_id" class="table table-bordered">
									<thead>
										<tr>
											<th scope="col">SL</th>
											<th scope="col">Bed Type</th>
											<th scope="col">Status</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
                                    @php
                                    $i=1;
                                    @endphp
									<tbody>
                                        @foreach($bedtypes as $bedtype)
										<tr>
											<td>{{$i++}}</td>
											<td>{{$bedtype->bed_type}}</td>
                                            <td>
											@if($bedtype->status==1)
        									<a href="{{url('/bed_type/inactive/'.$bedtype->id)}}" class="btn btn-sm btn-danger">Inactive</a>
       										 @else
        									<a href="{{url('/bed_type/active/'.$bedtype->id)}}" class="btn btn-sm btn-success">Active</a>
        									@endif
											</td>
                                            <td>
                                            <div class="btn-group">
												<a href="{{route('bed_type.edit',$bedtype->id)}}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$bedtype->id}}"><span class="ti-pencil-alt"></span></a>
												<a href="{{url('bed_type/delete')}}/{{$bedtype->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
											</div>
                                            </td>
										</tr>


                                        <!--Edit Modal -->
                                                <div class="modal fade" id="{{$bedtype->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Bed Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{route('bed_type.update',$bedtype->id)}}" method="post">
                                                            {{method_field('PUT')}}
                                                                @csrf
                                                                <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="">Bed Type</label>
                                                                            <input type="text" class="form-control" name="bed_type"  value="{{$bedtype->bed_type}}" placeholder="Enter Bed Type">
                                                                            @error('bed_type')
                                                                            <small class="text-danger">{{$message}}</small>
                                                                            @enderror
                                                                        </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Edit Modal -->
                                        @endforeach


										
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
                </div>
            </div>
@endsection