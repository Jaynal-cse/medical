@extends('layouts.dashboard');
@section('frontend')
active
@endsection

@section('breadcrumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('frontend')}}">Frontend</a></li>
</ol>
@endsection

@section('content')
<!-- Row starts -->

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
            @if(session('frontend_edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('frontend_edit')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class="card-header">
            <div class="row">
                <div class="col-lg-7">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Edit Frontend</h3>
                </div>
                
            </div>  
        </div>
                <div class="card-body"style = "font-family:Times New Roman">
                    <form action="{{url('frontend_editpost')}}" method="post" enctype = "multipart/form-data">
                  
                        @csrf
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Menu-1:</label>
                                <input type="hidden" name = "frontend_id" class="form-control" id="recipient-name" value = "{{$frontend_edits->id}}">
                                <input type="text" name = "menu" class="form-control" id="recipient-name" value = "{{$frontend_edits->menu}}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Menu-2:</label>
                                <input type="text" name = "url" class="form-control" id="recipient-name"value = "{{$frontend_edits->url}}">
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