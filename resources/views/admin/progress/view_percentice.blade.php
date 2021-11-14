@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
    <h3 class="block-title">Frontend Progress Bar</h3>
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
        <li class="breadcrumb-item active">View Progress Bar Info</li>
</div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual View Progress Bar Information</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>Employee Image :</td>
                            <td>
                                <img src="{{asset('uploads/progress/')}}/{{$view->image}}" alt="" height="80" width="80">
                            </td>
                        </tr>
                        <tr>
                            <td>Progress Bar Title :</td>
                            <td>{{$view->title}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Description :</td>
                            <td>{{$view->description}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Name One :</td>
                            <td>{{$view->progress_name_one}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar One % :</td>
                            <td>{{$view->percent_one}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Name Two :</td>
                            <td>{{$view->progress_name_two}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Two % :</td>
                            <td>{{$view->percent_two}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Name Three :</td>
                            <td>{{$view->progress_name_three}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Three % :</td>
                            <td>{{$view->percent_three}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Name Four :</td>
                            <td>{{$view->progress_name_four}}</td>
                        </tr>
                        <tr>
                            <td>Progress Bar Four % :</td>
                            <td>{{$view->percent_four}}</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection
 
     
