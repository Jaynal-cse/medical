@extends('layouts.dashboard');
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Designation</strong></h2>
        
    </div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    @if(session('designation'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('designation')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Add Designation</h3>
        </div>

        <div class="card-body">
            <form action="{{route('jobdesignation.store')}}" method="post">
                @csrf
                 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department: *</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="department_id">
                        <option value="">--Department select--</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id?? ''}}">{{$department->department_name?? ''}}</option>
                       @endforeach
                      </select>
                      @error('department_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Designation: *</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" rel="gp" data-size="10" data-character-set="0-9" name="designation" placeholder="Enter Designation...">
                      @error('designation')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
				 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Priority: *</label>
                    <div class="col-sm-8">
                      <input type="number"  class="form-control" rel="gp" data-size="10" data-character-set="0-9" name="priority" placeholder="Enter Priority...">
                      @error('priority')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
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




