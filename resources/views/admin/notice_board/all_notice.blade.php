@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
						<li class="breadcrumb-item active">Notice</li>
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
                            <strong>Successfully Added!</strong> Please Check in Notice Board List.
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
                            <strong>Successfully Edited!</strong> Please Check in Notice Board List.
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
                            <strong>Successfully Deleted!</strong> Please Check in Notice Board List.
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
                                <h3 class="widget-title">All Notice</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('notice_board.create')}}" class="btn btn-sm btn-primary">Add Notice</a>
                                </div>
                            <div class="table-responsive-sm mb-3 col-md-12">
                                <table id="table_id" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    @php
                                    $i=1;
                                    @endphp
                                    <tbody>
                                        @foreach($noticeboards as $noticeboard)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$noticeboard->title}}</td>
                                            <td>{{$noticeboard->description}}</td>
                                            <td>{{$noticeboard->start_date}}</td>
                                            <td>{{$noticeboard->end_date}}</td>
                                            <td>
											@if($noticeboard->status==1)
        									<a href="{{url('/notice/inactive/'.$noticeboard->id)}}" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
       										 @else
        									<a href="{{url('/notice/active/'.$noticeboard->id)}}" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
        									@endif
											</td>
                                            <td>
                                                <div class="btn-group">
												<a href="{{route('notice_board.show',$noticeboard->id)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a> 
												<a href="{{route('notice_board.edit',$noticeboard->id)}}"><button type="button" class="btn btn-primary mb-0"><span class="ti-pencil-alt"></span></button></a>
												<a href="{{url('notice/delete')}}/{{$noticeboard->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
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