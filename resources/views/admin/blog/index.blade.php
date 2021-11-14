@extends('layouts.dashboard');
@section('category')
active
@endsection
@section('breadcumb') 
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href = "#"></a>Blogs</li>
  <li class="breadcrumb-item active"><a href = "#"></a>All Blogs</li>
</ol>
@endsection

@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                   
                   <div class="row">
                        <div class="col-lg-9">
                             @if(session('blog_success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h5><strong>{{session('blog_success')}}</strong></h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if(session('blog_delete'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <h5><strong>{{session('blog_delete')}}</strong></h5>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                        </div>
                    </div>

                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-7">
                             <h3 class="font-weight-bold">All Blogs</h3>
                        </div>
                        
                    </div>  
                </div>
                <div class="card-body">
                  <div class="table-container">
                    
                    <div class="table-responsive">
                        <table id="table_id" class="table table-bordered table-striped" style = "font-family:Times New Roman">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Blog-title</th>
                                <th scope="col">Blog-content</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php 
                                    $serial = 1;
                                 @endphp
                                @foreach($blog as $blogs)
                                <tr>
                                    <th scope="row">{{$serial}}</th>
                                    @php 
                                        $serial++;
                                    @endphp
                                    <td>
                                        <img src = "{{asset('uploads/blog/')}}/{{$blogs->blog_photo}}" width = "80">
                                    </td>
                                    <td>{{$blogs->blog_title}}</td>
                                    <td>{!! $blogs->blog_content !!}</td>
                                    <td>
                                        <a href="{{route('blog.edit',$blogs->id)}}" class="icon green" data-toggle="tooltip" data-placement="top" title="Edit Row">
                                            <span style="font-size: 20px;margin: 0 15px" class="ti-pencil-alt"></span>
                                        </a>
                                        <a href="{{url('blog_delete')}}/{{$blogs->id}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Delete Row">
                                            <i style="font-size: 20px;" class="ti-trash"></i>
                                        </a>
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
</div>


<!-- Modal -->
<div class="modal fade" id="latestProductTitle" tabindex="-1" role="dialog" aria-labelledby="latestProductTitleLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="latestProductTitleLabel">Add Blog</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                   <div class="row">
                        <div class="col-sm-6">
                            <div class="more-left">
                               <div class="form-group">
                                    <label for="">Blog Title</label>
                                    <input type="text" name="blog_title" class="form-control">
                                    @error('blog_title')
                                        <small class="text-danger">{{$message}}</small>
                                  @enderror 
                                </div>
                               <div class="form-group">
                                    <label for="">Blog Content</label>
                                    <input type="text" name="blog_content" class="form-control">
                                    @error('blog_content')
                                        <small class="text-danger">{{$message}}</small>
                                  @enderror 
                                </div>
                             
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="more-left">
                                <div class="form-group">
                                    <label for="" class="pt-2">Blog Image</label> </br>
                                    <input type="file" name="blog_photo">
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-sm-12">
                            <div class="foot-more-btn">
                                <div class="form-group text-right pt-2 pr-5">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </div>
                   </div>
               </form>  
            </div>
        </div>
    </div>
</div>

<!-- </div> -->

    
@endsection