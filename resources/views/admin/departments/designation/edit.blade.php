@extends('layouts.dashboard')
@section('frontend')
active
@endsection

@section('breadcrumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('frontend')}}">Designation</a></li>
</ol>
@endsection

@section('content')
<!-- Row starts -->

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
            @if(session('designation_edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('designation_edit')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class="card-header">
            <div class="row">
                <div class="col-lg-7">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Edit Designation</h3>
                </div>
                
            </div>  
        </div>
                <div class="card-body"style = "font-family:Times New Roman">
                    <form action="{{route('jobdesignation.update',$designation->id)}}" method="post">                  
                        @csrf
						@method('PUT')
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Departmentment:</label>
                               
                                <select class="form-control" name="department_id"  >
                                <option value="">--Department select--</option>
                                @foreach($departments as $department)
                                <option value="{{$department->id}}" {{($department->id == $designation->department_id)?'selected':' '}} >{{$department->department_name}}</option>
                               @endforeach
                              </select>
                              @error('department_id')
                            <small class = "text-danger" style = "font-size:1rem;font-family:Times New Roman">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Designation:</label>
                                <input type="text" name = "designation" class="form-control" value = "{{$designation->designation}}">
                            </div>
							
							 <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Priority:</label>
                                <input type="text" name = "priority" class="form-control" value = "{{$designation->priority}}">
                            </div>
                            
                           
                            <div class="form-group float-right">
                            <button type ="submit" class = "btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection