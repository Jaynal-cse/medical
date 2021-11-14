@extends('layouts.dashboard')
@section('employee')
active
@endsection

@section('content')
<div class="content-wrapper">

<section class="content-header">
<div class="p-l-30 p-r-30">

<div class="header-title">
<h3 class = "text-bold">Human resources</h3>
</div>
</div>
</section>

<div class="content">
@if(session('employee'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{session('employee')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

<div class="panel-body panel-form">
<div class="row">
<div class="container-fluid pt-3">
    <div class="card">
        <div class="card-header">
        <div class="panel panel-bd">
<div class="panel-heading no-print">
    @foreach(App\Department::all() as $desig)
<div class="btn-group m-t-10 m-b-5"> <a class="btn btn-primary" href="{{url('singleEmployee')}}/{{$desig->id}}"> <i class="fa fa-list"></i> {{$desig->designation}} List</a> </div>
@endforeach
</div>
</div>
<div class = "float-right" style = "margin-top:-2rem"><button class = "btn btn-danger"><a href="{{url('designation')}}"><i class="fa fa-plus"></i>Add user</a></button></div>

        </div>

        <div class="card-body">
            <form action="{{url('employee_post')}}" method="post" enctype = "multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-8">
                    <select class="form-control dynamic" name="department_id">
					             <option value="">--Select Department--</option>
                                @foreach(App\Department::all() as $desig)
                                    <option value="{{$desig->id}}">{{$desig->department_name}}</option>
                                @endforeach    
                            </select>
                    </div>
                    @error('role')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-8">
                    <select class="form-control " name="designation_id" id="designationxxxx">
                             
                                    <option value="">--Select Designation--</option>
                                  
                            </select>
                    </div>
                    @error('role')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">  Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Name..." name="name">
                    </div>
                    @error('name')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
				 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Education </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Highest degree.." name="qualification">
                    </div>
                    @error('qualification')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Subject </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Subject.." name="subject">
                    </div>
                    @error('subject')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Institution </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Institution.." name="institution">
                    </div>
                    @error('institution')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
				 <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Experience</label>
                    <div class="col-sm-8">
                     <textarea name="experience" id="" cols="80" rows="5" placeholder = "Experience.."style = "border: 1px solid #E7F3ED"></textarea>
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Mobile No</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Mobile No.." name="mobile">
                    </div>
                    @error('insurance_code')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Email Address</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Email Address.." name="email">
                    </div>
                    @error('email')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Password </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Password .." name="password">
                    </div>
                    @error('password')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
				<div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Priority </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Number .." name="priority">
                    </div>
                    @error('priority')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
               
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" value="male">
                          <label class="custom-control-label" for="customRadioInline1">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input" value="female">
                          <label class="custom-control-label" for="customRadioInline2">Female</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline3" name="gender" class="custom-control-input" value="other">
                          <label class="custom-control-label" for="customRadioInline3">Other</label>
                        </div>
                    </div>
                    @error('gender')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Picture</label>
                    <div class="col-sm-8">
                    <input type="file" name = "picture" id="recipient-name" class = "form-control">
                    </div>
                    @error('picture')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"> Address</label>
                    <div class="col-sm-8">
                     <textarea name="address" id="" cols="80" rows="5" placeholder = "Address.."style = "border: 1px solid #E7F3ED"></textarea>
                    </div>
                   
                </div>
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-8">
                      <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio"id="customRadioInline4"  name="status" class="custom-control-input" value="active">
                          <label class="custom-control-label"for="customRadioInline4">Active</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio"id="customRadioInline5" name="status" class="custom-control-input" value="inactive">
                          <label class="custom-control-label"for="customRadioInline5">Inactive</label>
                        </div>
                    </div>
                    @error('status')
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{$message}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @enderror
                </div>
                
                <div class="form-group row">
                    <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-8">
                          <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
</div> 
@endsection

@section('footer_script')
  	
<script>
$(document).ready(function(){ 
 
    function call_designation(department_id){
            
              
              
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('designation.fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {   
						   document.getElementById("designationxxxx").innerHTML =result ;
                       }

               })       
      }
	  $('.dynamic').change(function(){
		     var value = $(this).val();
			 
		     call_designation(value);
		  });
		  
		  
		  
		
         		
    });





</script>
@endsection