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
        <li class="breadcrumb-item active">Updat Icon & Title</li>
</div>
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Icon & Title</h3>
        </div>

        <div class="card-body">
            <form action="{{route('icon.update', $icon->id)}}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Frontend Title :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="frontend_title" value="{{$icon->frontend_title}}">
                    </div>
                    @error('frontend_title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Dashboard Title :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="dashboard_title" value="{{$icon->dashboard_title}}">
                    </div>
                    @error('dashboard_title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
               
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Icon Image</label>
                    <div class="col-sm-8">
                      <input type="file" name="icon">
                    </div>
                    @error('icon')
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