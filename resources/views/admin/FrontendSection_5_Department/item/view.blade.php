@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Frontend Part</h3>
</div>
<div class="col-md-6">
	<ol class="breadcrumb">						
		<li class="breadcrumb-item">
			<a href="index.html">
				<span class="ti-home"></span>
			</a>
        </li>
        <li class="breadcrumb-item">Frontend</li>
        <li class="breadcrumb-item">Service</li>
        <li class="breadcrumb-item"><a href="{{route('frontend_department.index')}}">Our Services</a></li>
		<li class="breadcrumb-item active">Service View</li>
	</ol>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="widget-area-2 proclinic-box-shadow">
                            <div class="row">
                                <div class="col-md-10">
                                <h3 class="widget-title">Services View</h3>
                                </div>

                                <div class="col-md-2">
                                <a href="{{route('frontend_department.create')}}" class="btn btn-sm btn-primary">Add Service</a>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                            <a href=""><img src="{{asset('uploads/frontend_department/')}}/{{$frontendDepartment->image}}" width="200" alt=""></a>
                            </div>
                
                <div class="table-responsive-sm mb-3">
                    <table id="#" class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>Service Name</th>
                            <td>{{$frontendDepartment->service_name}}</td>
                        </tr>
                        <tr>
                            <th>Service Name Link</th>
                            <td>{{$frontendDepartment->service_name_link}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{$frontendDepartment->description}}</td>
                        </tr>
                        <tr>
                            <th>Icon</th>
                            <td>{{$frontendDepartment->icon}}</td>
                        </tr>
                        <tr>
                            <th>Sub Title</th>
                            <td>{{$frontendDepartment->sub_title}}</td>
                        </tr>
                        <tr>
                            <th>In Picture Button Text</th>
                            <td>{{$frontendDepartment->in_picture_button_text}}</td>
                        </tr>
                        <tr>
                            <th>In Picture Button Link</th>
                            <td>{{$frontendDepartment->in_picture_button_link}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$frontendDepartment->price}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($frontendDepartment->status == 1)
                                <span class="badge badge-primary">Active</span>
                                @else
                                <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection