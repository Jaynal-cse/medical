@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
					<ol class="breadcrumb">						
						<li class="breadcrumb-item">
							<a href="{{route('home')}}">
								<span class="ti-home"></span>
							</a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Bed</a></li>
						<li class="breadcrumb-item active">Add Bed</li>
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
            <h3 class="widget-title">Add Bed</h3>
            <form action="{{route('bed.store')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="bedType_id">Bed Type</label>
                        <select class="form-control" name="bedType_id" id="bedType_id">
                            @foreach($bedtypes as $bedtype)
                                <option value="{{$bedtype->id}}">{{$bedtype->bed_type}}</option>
                            @endforeach
                            </select>
                        @error('bedType_id')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Description</label>
                        <textarea placeholder="Description" name="description" class="form-control" id="description" rows="3">{{old('description')}}</textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label for="capacity">Capacity</label>
                        <input type="number" class="form-control" name="capacity" value="{{old('capacity')}}" placeholder="Capacity" id="capacity">
                        @error('capacity')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="charge">Charge</label>
                        <input type="text" class="form-control" name="charge" value="{{old('charge')}}" placeholder="Charge" id="charge">
                        @error('charge')
                            <small class="text-danger">{{$message}}</small>
                         @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="0">
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="1">
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