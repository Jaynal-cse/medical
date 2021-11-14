@extends('layouts.dashboard')
@section('disease')
active
@endsection
@section('content')
<div class="container-fluid pt-3">
@if(session('disease'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('disease')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
    <div class="card">
        <div class="card-header">
        <button class = "btn btn-primary text-bold"><i class="fa fa-list" aria-hidden="true"></i> Disease List</button>
        </div>

        <div class="card-body">
            <form action="{{url('diseasepost')}}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Disease Name *</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" placeholder="Disease Name..." name="disease_name">
                    </div>
                    @error('disease_name')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Disease Charge *</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" placeholder="Disease Charge..." name="disease_charge">
                    </div>
                    @error('disease_charge')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            
                          <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
