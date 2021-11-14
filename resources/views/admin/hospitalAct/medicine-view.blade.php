@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>Medicine View</h6>
    </div>
@endsection

@section('content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <strong><h4>Individual Medicine View</h4></strong>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                       
                        <tr>
                            <td>Medicine Name :</td>
                            <td>{{$view->medicine_name}}</td>
                        </tr>
                        <tr>
                            <td>Category name :</td>
                            <td>{{$view->category_name}}</td>
                        </tr>
                        <tr>
                            <td>Description :</td>
                            <td>{{$view->description}}</td>
                        </tr>
                        <tr>
                            <td>Price :</td>
                            <td>{{$view->price}}</td>
                        </tr>
                        <tr>
                            <td>Doctor Name :</td>
                            <td>{{$view->manufactured_by}}</td>
                        </tr>
                        <tr>
                            <td>Status :</td>
                            <td>{{$view->status}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Content -->
 @endsection