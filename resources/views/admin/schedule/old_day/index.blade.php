@extends('layouts.dashboard');
@section('frontend')
active
@endsection

@section('breadcumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('')}}">Days</a></li>
</ol>
@endsection
@section('content')
    <div class="main-container">
        
 
<!-- Row end -->
<!-- Row starts -->

    
     @if(session('day_delete'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{session('day_delete')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    
    <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-7">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Days</h3>
                </div>
                <div class="col-lg-5">
                    <a href="{{route('day.create')}}" class="btn btn-primary float-right" style="font-size:18px" >
                    <span class="icon-plus1">Add</span></a>
                </div>
            </div>  
        </div>
		
            <div class="card-body">
            <div class="table-container">
            <div class="t-header"></div>
            <div class="table-responsive">
                <table id="table_id" class="table custom-table" style = "font-family:Times New Roman">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>                        
                        <th scope="col">Name</th>
						<th scope="col">Priority</th>
						
   		   			   <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @php 
                $serial = 1;
            @endphp
          @foreach($days as $sub)
            <tr>
            <th scope="row">{{$serial}}</th>
              @php 
                $serial++;
            @endphp
             <td>{{$sub->name}}</td>
              <td>{{$sub->priority}}</td>
              
              <td>
              
              <a href="{{route('day.edit',$sub->id)}}" class="icon green" data-toggle="tooltip" data-placement="top" title="Edit Row">
                    <span style="font-size: 20px;margin: 0 15px" class="ti-pencil-alt"></span>
                </a>
                <a href="{{route('day.delete',$sub->id)}}" class="icon blue" title="Delete Row">
                    <i style="font-size: 20px;" class="ti-trash"></i>
                </a>
                   
                </td>
            </form>
                
            </tr>
            
            @endforeach
          </tbody>
        </table>
          </div>
        </div>
            </div>
            
        </div>
     <!---->
  
    </div>
@endsection