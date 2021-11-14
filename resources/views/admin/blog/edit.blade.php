@extends('layouts.dashboard');
@section('breadcumb') 
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
  <li class="breadcrumb-item active"><a href = "{{url('blog')}}">Blog</a></li>
</ol>
@endsection
@section('content')
<div class="container">
<!-- Row starts -->

    <!-- Row ends -->
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
            @if(session('blog_edit'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('blog_edit')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
                <div class = "card-header">
                     <h3 class="font-weight-bold"style = "font-family:Times New Roman; font-size:2rem" >Edit Blog Post</h3>
                </div>
                
                <div class="card-body" style = "font-family:Times New Roman">
                    <form action="{{route('blog.update',$blog->id)}}" method="post" enctype = "multipart/form-data">
                    {{method_field('PUT')}}
                        @csrf
                        
                        <div class="form-group">
                            <label for="" style="font-size:1.1rem">Blog title</label>
                           
                            <input type="text" name = "blog_title" class = "form-control" value = "{{$blog->blog_title?? ''}}">
                        </div>
                        <div class="form-group">
                            <label for="" style="font-size:1.1rem">Blog Content</label>
                            <textarea id="summernote" name="blog_content" class = "form-control" cols = "30" rows = "10" value = "{{$blog->blog_content?? ''}}" >
                            </textarea>
                             
                        </div>
                        <div class="form-group">
                                <label for="" style="font-size:1.1rem">Blog photo</label>
                                <input type="file" name = "blog_photo" id = "inpFile" class = "form-control">
                                <div class = "image-preview" id = "imagepreview" style = "margin-top:1rem;position: relative;">
                               <img src="{{asset('dashboard_assets/img/default.jpg')}}" alt="" class = "image-preview-img " width = "150px" height = "150px">
                                <span class = "image-preview-text"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type ="submit" class = "btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection

@section('footer-script')
    <script>
        const inFile = document.getElementById("inpFile");
        const previewContainer = document.getElementById("imagepreview");
        const previewImage = previewContainer.querySelector(".image-preview-img");
        const previewText = previewContainer.querySelector(".image-preview-text");
        
        inFile.addEventListener("change",function(){
            const file = this.files[0];
           
            if(file){
               const reader = new FileReader();
               previewText.style.display = "none";
               previewImage.style.display = "block";

              reader.addEventListener("load", function(){
                
                previewImage.setAttribute("src", this.result);

             });
             reader.readAsDataURL(file)
             }
             else{
                previewText.style.display = null;
               previewImage.style.display = null;
               previewImage.setAttribute("src", "");
             }
        });
    </script>
@endsection