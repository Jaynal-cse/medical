@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
    <h3 class="block-title">Frontend About Title</h3>
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
        <li class="breadcrumb-item active">All About Title</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container-fluid">
    <div class="row">

        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('success')}}</strong>Please check in About Title List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('delete')}}</strong>Please check in About Title List.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="pt-1 pb-1">{{session('update')}}</strong>Please check in About Title List.
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
                        <h3 class="widget-title">All About Titles List</h3>    
                    </div>
                    <div class="float-right pr-5">
                        <a href="{{route('abouttitle.create')}}"><button type="button" class="btn btn-primary mb-0"><span aria-hidden="true">+</span> Add</button></a>
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
                                <th>About Title</th>
                                <th>About Sub Title</th>
                                <th>About Description</th>
                                <th>Designation</th>
                                <th>About Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                               $serial = 1;
                             @endphp
                           
                           @foreach($abouts as $about)
                            <tr>
                                 <th scope="row">{{$serial}}</th>
                                     @php 
                                      $serial++;
                                     @endphp
                                
                                <td>{{substr($about->about_title,0,25)}}...more</td>
                                <td>{{substr($about->about_sub_title,0,20)}}...more</td>
                                <td>{{substr($about->about_desp,0,30)}}...more</td>
                                <td>{{$about->designation}}</td>
                                <td>
                                    <img src="{{asset('uploads/about_title/')}}/{{$about->about_image}}" alt="" width="50">
                                </td>
                               <td>
                                    <a href="{{url('aboutsActive')}}/{{$about->id}}" class ="{{($about->status == 0)?'badge badge-secondary rounded-pill':'badge badge-success rounded-pill'}}">
                                      {{($about->status == 0)?'Deactive':'Active'}}
                                    </a>
                                </td>

                                <td>
                                    <a href="{{url('view_about_title')}}/{{$about->id}}"><button type="button" class="btn btn-success mb-0"><span class="ti-eye"></span></button></a>
                                    <a href="{{route('abouttitle.edit', $about->id)}}"><button type="button" class="btn btn-info mb-0"><span class="ti-pencil"></span></button></a>
                                    <a href="{{url('delete_about_title')}}/{{$about->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
                                  
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
 
     
