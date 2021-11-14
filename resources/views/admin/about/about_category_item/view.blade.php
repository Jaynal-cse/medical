@extends('layouts.dashboard')
@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Frontend Part</h3>
</div>
<div class="col-md-6">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{route('home')}}">
                <span class="ti-home"></span>
            </a>
        </li>
        <li class="breadcrumb-item">Frontend Part</li>
        <li class="breadcrumb-item">About Part</li>
        <li class="breadcrumb-item active">About Category Item</li>
    </ol>
</div>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12 mt-2">
                @if(session('added_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Done!</strong>
                        {{session('added_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 mt-2">
                @if(session('edit_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successfully Edited!</strong>
                        {{session('edit_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>


            <div class="col-lg-12 mt-2">
                @if(session('delete_success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Successfully Deleted!</strong>
                        {{session('delete_success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="widget-area-2 proclinic-box-shadow">
                    <div class="row">
                        <div class="col-md-11">
                            <h3 class="widget-title">All About Category</h3>
                        </div>

                        <div class="col-md-1">
                            <a href="{{route('about_category_item.create')}}" class="btn btn-sm btn-primary"><span class="ti-plus"></span>Add</a>
                        </div>
                    </div>
                    <div class="table-div">
                        <table id="table_id" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Bullet Point</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Multimedia</th>
                                    <th class="text-center" scope="col">Status</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            @php
                                $i=1;
                            @endphp
                            <tbody>
                            @foreach($category_items as $category_item)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$category_item->get_category->about_category}}</td>
                                    <td>{{$category_item->title}}</td>
                                    <td>
                                        <textarea name="" id="" rows="8">
                                        {{$category_item->paragraph}}
                                        </textarea>
                                    </td>
                                    <td>
                                        @foreach($category_item->get_bullet_points as $key => $bulletPoint)
                                            {{ $bulletPoint->bullet_point }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <img src="{{asset('uploads/about_media/')}}/{{$category_item->image}}" width="50" alt="">
                                    </td>
                                    <td>
                                        <img src="{{asset('uploads/about_media/')}}/{{$category_item->multimedia}}" width="50" alt="">
                                    </td>
                                    
                                    <td class="text-center">
                                        @if($category_item->status == 1)
                                            <a href="" class="btn btn-sm btn-success"><span class="ti-arrow-up"></span></a>
                                        @else
                                            <a href="" class="btn btn-sm btn-danger"><span class="ti-arrow-down"></span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('about_category_item.edit', $category_item->id)}}" type="button" class="btn btn-primary"><span class="ti-pencil-alt"></span></a>
                                            <a href="{{url('about/category/item/delete')}}/{{$category_item->id}}"><button type="button" class="btn btn-danger mb-0"><span class="ti-trash"></span></button></a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
