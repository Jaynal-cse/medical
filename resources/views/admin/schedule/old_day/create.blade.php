@extends('layouts.dashboard');
@section('product')
active
@endsection

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Day</strong></h2>
        
    </div>
@endsection


@section('content')

<div class="container-fluid pt-3">
    @if(session('day_add'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('day_add')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Add Day Schedule</h3>
        </div>

        <div class="card-body">
            <form action="{{route('day.store')}}" method="post">
                @csrf
                <div class="row">
				 <div class="col-md-8">
               <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Name: *</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" rel="gp" data-size="10" data-character-set="0-9" name="name" placeholder="Enter Day...">
                      @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
				 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">String: *</label>
                    <div class="col-sm-8">
					   
                      <input type="text"  class="form-control"    name="priority" placeholder="Number...">
                      @error('priority')
                            <small class="text-danger">{{$message}}</small>
                        @enderror  
                    </div>
                </div>
                
                
                <div class="form-group row">
                
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                           
                            <button type="submit" style="width:100%" class="btn btn-info">Save</button>
                        </div>
                 </div>
                </div>
				<div class="col-md-4" >
				   <table class="table table-bordered">
    <thead>
      <tr>
        <th>Day</th>
        <th>Value</th>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Friday</td>
        <td>1</td>
        
      </tr>
      <tr>
        <td>Saturday</td>
        <td>2</td>
        
      </tr>
      <tr>
        <td>Sunday</td>
        <td>3</td>
        
      </tr>
	  <tr>
        <td>Monday</td>
        <td>4</td>
        
      </tr>
	  <tr>
        <td>Tuesday</td>
        <td>5</td>
        
      </tr>
	   <tr>
        <td>Wednesday</td>
        <td>6</td>
        
      </tr>
	  <tr>
        <td>Thursday</td>
        <td>7</td>
        
      </tr>
    </tbody>
  </table>
				</div>
				</div>
				</div>
            </form>
        </div>
    </div>
</div>



@endsection




