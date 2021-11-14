@extends('layouts.dashboard')
@section('frontend')
active
@endsection

@section('breadcrumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{route('day.index')}}">Day</a></li>
</ol>
@endsection

@section('content')
<!-- Row starts -->

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
            @if(session('day_edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('day_edit')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class="card-header">
            <div class="row">
                <div class="col-lg-7">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Edit Day</h3>
                </div>
                
            </div>  
        </div>
                <div class="card-body"style = "font-family:Times New Roman">
                    <form action="{{route('day.update',$days->id)}}" method="post">                  
                        @csrf
						@method('PUT')
                        
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name:</label>
                                <input type="text" name = "name" class="form-control" value = "{{$days->name}}">
                            </div>
							<div class="form-group">
                                <label for="recipient-name" class="col-form-label">Priority:</label>
                                <input type="number" name = "priority" class="form-control" value = "{{$days->priority}}">
                            </div>
                            
                           
                            <div class="form-group float-right">
                            <button type ="submit" class = "btn btn-danger">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection