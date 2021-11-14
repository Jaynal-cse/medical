@extends('layouts.dashboard')

@section('breadcrumb') 
<div class="col-md-6 text-white">
        <h2 class="block-title"><strong>Hospital Activities</strong></h2>
        <h6>Medicine</h6>
    </div>
@endsection


@section('content')
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
            <h3>Add Medicine Details</h3>
        </div>

        <div class="card-body">
            <form action="{{url('medicineEditPost')}}" method="post">
                @csrf
                <input type="hidden" name="medicine_id" class="form-control" value="{{$medicine->id}}">

                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Medicine Name *</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Medicine Name" name="medicine_name" value="{{$medicine->medicine_name}}">
                      @error('medicine_name')
                            <small class="text-danger">{{$message}}</small>
                      @enderror  
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Category Name *</label>
                    <div class="col-sm-7">
                      <select class="form-control" name="category_name" value="{{$medicine->category_name}}">
                        <option value="">Select Option</option>
                                @foreach($medicat as $medicats)
                                    <option value="{{$medicats->category_name}}">{{$medicats->category_name}}</option>
                                @endforeach    
                            </select>
                      @error('category_id')
                        <small class="text-danger">{{$message}}</small>
                    @enderror  
                    </div>
                    
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description </label>
                    <div class="col-sm-7">
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="description">{{$medicine->description}}</textarea>
                      @error('description')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Price </label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" placeholder="Price" name="price" value="{{$medicine->price}}">
                      @error('price')
                        <small class="text-danger">{{$message}}</small>
                     @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Manufactured By</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control" name="manufactured_by" value={{$medicine->manufactured_by}}>
                      @error('manufactured_by')
                        <small class="text-danger">{{$message}}</small>
                     @enderror  
                    </div>
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-7">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="Active" {{$medicine->status == "Active"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline1">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="Inactive" {{$medicine->status == "Inactive"? 'checked': ''}}>
                          <label class="custom-control-label" for="customRadioInline2">Inactive</label>
                        </div>
                    </div>
                    @error('status')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                            <button class="btn btn-info">Reset</button>
                            <button class="btn" style="width: 31px; border-radius: 50%; margin-top: 2px; padding-right: 5px; height: 31px; left: 67px; position: absolute;">or</button>
                            <button type="submit" class="btn btn-success" style="margin-left: 8px;">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    //for reset button
    let btnReset = document.querySelector('button');
    let inputs = document.querySelectorAll('input');
    btnClear.addEventListener('click', () => {
        inputs.forEach(input => input.value = '');
    });
</script>

@endsection