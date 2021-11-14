@extends('layouts.dashboard')
@section('frontend')
active
@endsection

@section('breadcrumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('frontend')}}">Submenu</a></li>
</ol>
@endsection

@section('content')
<!-- Row starts -->

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
            @if(session('Submenu_edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('Submenu_edit')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class="card-header">
            <div class="row">
                <div class="col-lg-7">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Edit Submenu</h3>
                </div>
                
            </div>  
        </div>
                <div class="card-body"style = "font-family:Times New Roman">
                    <form action="{{url('sub_editpost')}}" method="post">
                  
                        @csrf
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Menu:</label>
                               <input type="hidden" name = "sub_id" class="form-control" value = "{{$sub_edits->id}}">
                                <select class="form-control" name="menu_id"  >
                                <option value="">--Menu select--</option>
                                @foreach($menu as $submenu)
                                <option value="{{$submenu->id}}">{{$submenu->menu}}</option>
                               @endforeach
                              </select>
                              @error('menu_id')
                            <small class = "text-danger" style = "font-size:1rem;font-family:Times New Roman">{{$message}}</small>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Sub-Menu:</label>
                                <input type="text" name = "submenu" class="form-control" value = "{{$sub_edits->submenu}}">
                            </div>
                             <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Page url:</label>
                                <input type="text" name = "suburl" class="form-control" value = "{{$sub_edits->suburl}}">
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