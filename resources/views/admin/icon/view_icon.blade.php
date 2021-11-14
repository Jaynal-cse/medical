@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
    <h3 class="block-title">Frontend Icon & Title</h3>
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
        <li class="breadcrumb-item active">View Icon & Title</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual View Icon & Title</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Icon Image :</td>
                            <td>
                                <img src="{{asset('uploads/icon/')}}/{{$view->icon}}" alt="" height="80" width="80">
                            </td>
                        </tr>
                        <tr>
                            <td>Frontend Title :</td>
                            <td>{{$view->frontend_title}}</td>
                        </tr>
                        <tr>
                            <td>Dashboard Title :</td>
                            <td>{{$view->dashboard_title}}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
