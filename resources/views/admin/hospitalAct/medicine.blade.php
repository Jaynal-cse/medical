@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>All Medicine List</h6>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-8">
            @if(session('medicine_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicine_delete')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('medicine_update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicine_update')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            @if(session('medicine_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h6><strong class="pt-1 pb-1">{{session('medicine_add')}}</strong></h6>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>


        <!-- Widget Item -->
        <div class="col-md-12 pt-3">
            <div class="card">
                    <div class="card-header">
                        <div class="add pb-2">
                            <a href="{{url('addMedicine')}}"><button type="button" class="btn btn-success mb-0"><span aria-hidden="true">+</span> Add Medicine</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive mb-3">
                            <table id="table_id" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">SL.No</th>
                                    <th>Medicine Name</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>price</th>
                                    <th>Manufactured By</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach($medicines as $medicine)
                                    <tr>
                                      <th scope="row">{{$i}}</th>
                                        
                                        <td>{{$medicine->medicine_name}}</td>
                                        <td>{{$medicine->category_name}}</td>
                                        <td>{{substr($medicine->description,0,30)}}....more</td>
                                        <td>{{$medicine->price}}</td>
                                        <td>{{$medicine->manufactured_by}}</td>
                                        <td>{{$medicine->status}}</td>
                                        <td>
                                            <a href="{{url('medicineView')}}/{{$medicine->id}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                            
                                            <a href="{{url('medicineEdit')}}/{{$medicine->id}}"type="submit" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>

                                            <a href="{{url('medicineDel')}}/{{$medicine->id}}"type="submit" title="Delete" name="button" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
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