@extends('layouts.dashboard');
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Menu</strong></h2>
        
    </div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    @if(session('submenu'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('submenu')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Add Sub-Menu</h3>
        </div>

        <div class="card-body">
            <form action="{{url('submenu_post')}}" method="post">
                @csrf
                 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Sub-Menu: *</label>
                    <div class="col-sm-8">
                    <select class="form-control" name="menu_id">
                        <option value="">--Menu select--</option>
                        @foreach($menu as $submenu)
                        <option value="{{$submenu->id?? ''}}">{{$submenu->menu?? ''}}</option>
                       @endforeach
                      </select>
                      @error('menu_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">submenu: *</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" rel="gp" data-size="10" data-character-set="0-9" name="submenu" placeholder="Enter submenu...">
                      @error('submenu')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Page Url: *</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" rel="gp" data-size="10" data-character-set="0-9" name="suburl" placeholder="Enter url...">
                       
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




