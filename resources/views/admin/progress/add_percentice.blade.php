@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Frontend Progress Bar Section</h3>
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
        <li class="breadcrumb-item active">Add Progress Bar Info</li>
</div>
@endsect
@endsection

@section('content')
<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Add Progress Bar Information</h3>
        </div>

        <div class="card-body">
            <form action="{{route('percentice.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Add Title :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Title" name="title">
                    </div>
                    @error('title')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
              
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">About Description :</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" id="" rows="7" placeholder="Add Description" name="description"></textarea>
                      @error('description')
                        <small class="text-danger">{{$message}}</small>
                      @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar One Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Name First" name="progress_name_one">
                    </div>
                    @error('progress_name_one')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar One Percentace :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Percent First" name="percent_one">
                    </div>
                    @error('percent_one')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Two Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Name Second" name="progress_name_two">
                    </div>
                    @error('progress_name_two')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Two Percentace :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Percent Second" name="percent_two">
                    </div>
                    @error('percent_two')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Three Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Name Third" name="progress_name_three">
                    </div>
                    @error('progress_name_three')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Three Percentace :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Percent Third" name="percent_three">
                    </div>
                    @error('percent_three')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Four Name :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Name Fourth" name="progress_name_four">
                    </div>
                    @error('progress_name_four')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Four Percentace :</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Add Progress Percent Fourth" name="percent_four">
                    </div>
                    @error('percent_four')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Progress Bar Image</label>
                    <div class="col-sm-8">
                      <input type="file" name="image">
                    </div>
                    @error('image')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                
                <input type="hidden" name="status">
                
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