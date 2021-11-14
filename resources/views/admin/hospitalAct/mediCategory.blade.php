@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>All Medicine Categories</h6>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('medicat_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicat_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('medicat_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicat_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('medicat_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicat_add')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>


        <!-- Widget Item -->
        <div class="col-md-10 pt-3">
            <div class="card">
                    <div class="card-header">
                        <div class="add pb-2">
                            <a href="{{url('addMediCategory')}}"><button type="button" class="btn btn-success mb-0"><span aria-hidden="true">+</span> Add Medicine Category</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL.No</th>
                                    <th>Medicine Category Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($medicat as $medicats)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                        
                                        <td>{{$medicats->category_name}}</td>
                                        <td>{{substr($medicats->description,0,30)}}....more</td>
                                        <td>{{$medicats->status}}</td>
                                        <td>
                                            <a href="{{url('mediCategoryView')}}/{{$medicats->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            
                                            <a href="{{url('mediCategoryEdit')}}/{{$medicats->id}}"type="submit" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>

                                            <a href="{{url('mediCategoryDel')}}/{{$medicats->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
             
                                </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
        </div>
        <!-- /Widget Item -->
    </div>
</div>

@endsection