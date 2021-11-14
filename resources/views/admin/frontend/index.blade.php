@extends('layouts.dashboard');
@section('frontend')
active
@endsection

@section('breadcumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('frontend')}}">Header</a></li>
</ol>
@endsection
@section('content')
    <div class="main-container">
        
 
<!-- Row end -->
<!-- Row starts -->

    @if(session('frontend_delete'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('frontend_delete')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
    @endif
    @if(session('frontend_status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('frontend_status')}}</strong>
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
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem">Header part</h3>
                </div>
                <div class="col-lg-5">
                    <button type="button" class="btn btn-primary float-right" style="font-size:25px" data-toggle="modal" data-target="#customModalTwo">
                    <span class="icon-plus1"></span>
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
                        <th scope="col">Menu</th>
                        <th scope="col">Page Url</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
            @php 
                $serial = 1;
            @endphp
          @foreach($frontends as $frontend)
            <tr>
            <th scope="row">{{$serial}}</th>
              @php 
                $serial++;
            @endphp
              <td>{{$frontend->menu}}</td>
              <td>{{$frontend->url}}</td>
              
              <td>
                <a href="{{url('frontend_active')}}/{{$frontend->id}}" class = "{{($frontend->status == 1)?'badge badge-Success rounded-pill':'badge badge-secondary rounded-pill'}}">
                {{($frontend->status == 1)?'Active':'Deactive'}}
                </a>
                </td>
              <td>
              <a href="{{url('frontend_edit')}}/{{$frontend->id}}" class="icon green" data-toggle="tooltip" data-placement="top" title="Edit Row">
                    <span style="font-size: 20px;margin: 0 15px" class="ti-pencil-alt"></span>
                </a>
                <a href="{{url('frontend_delete')}}/{{$frontend->id}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete Row">
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