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
						<li class="breadcrumb-item active">Edit Notice</li>
					</ol>
				</div>
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">

<div class="row">
    <!-- Widget Item -->
    <div class="col-md-12">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Add Notice</h3>
            <form action="{{route('notice_board.update',$noticeBoard->id)}}" method="POST">
            {{method_field('PUT')}}
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$noticeBoard->title}}" placeholder="Title" id="title">
                        @error('text')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" id="description" rows="3">{{$noticeBoard->description}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="start_date">Start Date</label>
                        <input type="date" class="form-control" name="start_date" value="{{$noticeBoard->start_date}}" placeholder="Start Date" id="start_date">
                        @error('start_date')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" name="end_date" value="{{$noticeBoard->end_date}}" placeholder="End Date" id="end_date">
                        @error('end_date')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0" {{$noticeBoard->status == "0" ? 'checked':''}}>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1" {{$noticeBoard->status == "1" ? 'checked':''}}>
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                        @error('status')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="form-group col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Widget Item -->
</div>
</div>
<!-- /Main Content -->
@endsection