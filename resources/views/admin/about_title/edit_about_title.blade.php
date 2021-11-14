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
        <li class="breadcrumb-item active">Add About Title</li>
</div>
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add About Title</h3>
        </div>

        <div class="card-body">
            <form action="{{route('abouttitle.update', $abouttitle->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}

            @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">About Title :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="about_title" value="{{$abouttitle->about_title}}">
                    </div>
                    @error('about_title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">About 
                    Sub Title :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="about_sub_title" value="{{$abouttitle->about_sub_title}}">
                    </div>
                    @error('about_sub_title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">About Description :</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="" rows="7" name="about_desp">{{$abouttitle->about_desp}}</textarea>
                      @error('about_desp')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Designation :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="designation" value="{{$abouttitle->designation}}">
                    </div>
                    @error('designation')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">About Image</label>
                    <div class="col-sm-8">
                      <input type="file" name="about_image">
                    </div>
                    @error('about_image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8">
                        <button class="btn btn-info">Reset</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<script>
    let btnReset = document.querySelector('button');
    let inputs = document.querySelectorAll('input');
    btnClear.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
    });
</script>



@endsection