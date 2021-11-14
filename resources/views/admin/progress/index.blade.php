@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
    <h3 class="block-title">Frontend Progress Bar Section</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Frontend</a></li>
        <li class="breadcrumb-item active">All Progress Bar Info</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('success')}}</strong>Please check in List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('delete')}}</strong>Please check in List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('update')}}</strong>Please check in List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('status')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>

        <!-- Widget Item -->
        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                <div class="top">
                    <div class="float-left">
                        <h3 class="widget-title">All Progress Bar Information</h3>    
                    </div>
                    <div class="float-right pr-5">
                        <a href="{{route('percentice.create')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add</button></a>
                    </div>   
                </div>
                
                <div class="table-responsive mb-3">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="no-sort">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="select-all">
                                        <label class="custom-control-label" for="select-all"></label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Progress Name One</th>
                                <th>Progress Name Two</th>
                                <th>Progress Name Three</th>
                                <th>Progress Name Four</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                               $serial = 1;
                             @endphp
                           
                          @foreach($percents as $percent)
                            <tr>
                                 <th scope="row">{{$serial}}</th>
                                     @php 
                                      $serial++;
                                     @endphp
                                
                            <td>{{substr($percent->title,0,20)}}..more</td>   
                            <td>{{substr($percent->description,0,20)}}..more</td>   
                            <td>{{$percent->progress_name_one?? ''}}</td>   
                            <td>{{$percent->progress_name_two?? ''}}</td>   
                            <td>{{$percent->progress_name_one?? ''}}</td>   
                            <td>{{$percent->progress_name_one?? ''}}</td>
                            <td>
                                <img src="{{asset('uploads/progress/')}}/{{$percent->image}}" alt="" width="50">
                            </td>
                            <td>
                                <a href="{{url('progressActive')}}/{{$percent->id}}" class ="{{($percent->status == 0)?'badge badge-secondary rounded-pill':'badge badge-success rounded-pill'}}">
                                  {{($percent->status == 0)?'Deactive':'Active'}}
                                </a>
                            </td>   

                                <td>
                                    <a href="{{url('view_progress_bar')}}/{{$percent->id}}"><button type="button" class="btn btn-success mb-0"><span class="ti-eye" title="View"></span></button></a>
                                    <a href="{{route('percentice.edit',$percent->id)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-pencil" title="Edit"></span></button></a>
                                    <a href="{{url('delete_progress_bar')}}/{{$percent->id}}"><button type="button" class="btn btn-danger mb-0" title="Delete"><span class="ti-trash"></span></button></a>
                                  
                                </td>
                            </tr>
                           @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>
    <!-- /Main Content -->
 @endsection
 
     
