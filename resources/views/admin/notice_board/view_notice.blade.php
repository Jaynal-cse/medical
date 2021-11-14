@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('notice_board.index')}}">Notice</a></li>
						<li class="breadcrumb-item active">View Notice</li>
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
                                <h3 class="widget-title">View Notice</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('notice_board.create')}}" class="btn btn-sm btn-primary">Add Notice</a>
                                </div>
                            </div>
                
                <div class="table-responsive-sm mb-3">
                    <table id="#" class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Title</th>
                                <td>{{$noticeBoard->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$noticeBoard->description}}</td>
                        </tr>
                        <tr>
                            <th>Start Date</th>
                                <td>{{$noticeBoard->start_date}}</td>
                        </tr>
                        <tr>
                            <th>End Date</th>
                                <td>{{$noticeBoard->end_date}}</td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection