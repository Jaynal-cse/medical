@extends('layouts.dashboard')

@section('breadcrumb')
<div class="col-md-6">
	<h3 class="block-title">Add Doctor Info</h3>
</div>
<div class="col-md-6">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.html">
				<span class="ti-home"></span>
			</a>
        </li>
        <li class="breadcrumb-item"><a href="{{route('doctor.index')}}">Doctors</a></li>
		<li class="breadcrumb-item active">Add Doctors</li>
	</ol>
</div>
@endsection

@section('content')

<!-- Main Content -->
<div class="container-fluid">

<div class="row">
        <div class="col-lg-12 mt-2">
        @if(session('added_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('added_success')}}  !...</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
        @endif
		@if(session('education'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('education')}}  !...</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
        @endif
        </div>
    <!-- Widget Item -->
    <div class="col-md-8">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Add Doctor</h3>
            <form action="{{route('doctor.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
			
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Doctor Name</label>
                        <input type="text" class="form-control" name="doctor_name"  placeholder=" Name" id="first_name">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                      <div class="form-group col-md-6">
                        <label for="department_id">Department</label>
                        <select name="department" id="department_id"  class="form-control dynamic"  >

                            <option value="">--Select Department--</option>
                            @foreach($department as $departments)
                            <option value="{{$departments->id}}">{{$departments->department_name}}</option>
                            @endforeach
                        </select>

                        @error('department')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					 
				    <div  class="form-group col-md-6" >
                     <label for="designation" > Designation </label>
					  <select name="designation" id="designationaaa" class="form-control" >
                           <option value="">--Select Designation--</option>

                      </select>					  
                    </div>
					
					  
					
					
					
                    <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" name="email"  placeholder="Email" class="form-control" id="Email">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                  

                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea placeholder="Address" name="address" class="form-control" id="address" rows="3">{{old('address')}}</textarea>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    

                    <div class="form-group col-md-6">
                        <label for="short_biography">Short Biography</label>
                        <textarea placeholder="Short Biography" name="short_biography" class="form-control" id="short_biography" rows="3">{{old('short_biography')}}</textarea>
                        @error('short_biography')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					<div class="form-group col-md-6">
                        <label for="phone">Phone No</label>
                        <input type="text" name="phone_no" placeholder="Phone" class="form-control" id="phone">
                        @error('phone_no')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="specialist">Specialist</label>
                        <input type="text" name="specialist" value="{{old('specialist')}}" placeholder="Specialist" class="form-control" id="specialist">
                        @error('specialist')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{old('date_of_birth')}}" placeholder="Date of Birth" class="form-control" id="dob">
                        @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					<div class="form-group col-md-6">
                        <label for="dob">Visibility Order(Priority)</label>
                        <input type="number" name="priority"  placeholder="Priority" class="form-control" id="priority">
                        @error('priority')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio3" value="Other">
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                        @error('sex')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control" name="blood_group" value="{{old('blood_group')}}" id="blood_group">
                            <option value="">Select</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>

                        @error('blood_group')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>



                    <div class="form-group col-md-6">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                        @error('status')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Fee</label><br>
                       <input type="number" class="form-control" placeholder="Enter Fee" name="fee">
                        @error('fee')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>



                    <div class="form-group col-md-12">
                        <label for="file">Picture</label>
                        <input type="file" name="image" id = "inpFile" class="form-control" value="{{old('image')}}" id="file">

                        <div class = "image-preview" id = "imagepreview" style = "width:200px; position: relative;">
                        <img src="{{asset('dashboard_assets/images/default.png')}}" alt="" class = "image-preview-img " width = "150px" height = "150px">
                            <span class = "image-preview-text"></span>
                        </div>

                        @error('image')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- /Widget Item -->
    <!-- Widget Item -->
    <div class="col-md-4">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Add Doctor Degree</h3>
            <form action="{{url('education')}}" method="POST" enctype="multipart/form-data">
            @csrf
                   
                     <div class="form-group ">
                        <label for="department_id">Department</label>
                        <select name="department_id" id="department_id"  class="form-control doctor"  >

                            <option value="">--Select Department--</option>
                            @foreach($department as $departments)
                            <option value="{{$departments->id}}">{{$departments->department_name}}</option>
                            @endforeach
                        </select>

                        @error('department')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					 
				    <div  class="form-group " >
                     <label for="designation" > Doctor </label>
					  <select name="doctor_id" id="designationxxx" class="form-control" >
                           <option value="">--Select Doctor--</option>

                      </select>					  
                    </div>
					

                    <div class="form-group">
                        <label for="specialist">Education year</label>
                        <input type="text" name="edu_year" value="{{old('edu_year')}}" placeholder="Education year..." class="form-control" id="specialist">

                    </div>
                    <div class="form-group">
                        <label for="specialist">Education degree</label>
                        <input type="text" name="edu_degree" value="{{old('edu_degree')}}" placeholder="Education degree..." class="form-control" id="specialist">

                    </div>
                    <div class="form-group">
                        <label for="specialist">Education institute</label>
                        <input type="text" name="edu_institute" value="{{old('edu_institute')}}" placeholder="Education institute.." class="form-control" id="specialist">

                    </div>
					<div class="form-group">
                        <label for="specialist">Higher Degree </label>
                        
                        <textarea placeholder="Write.." name="higher_degree" class="form-control" id="address" rows="3">{{old('address')}}</textarea>
                        @error('higher_degree')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					<div class="form-group">
                       <label for="specialist">Professional Degree </label>
                        
                        <textarea placeholder="Write.." name="professional_degree" class="form-control" id="address" rows="3">{{old('address')}}</textarea>
                        @error('professional_degree')
                            <small class="text-danger">{{$message}}</small>
                        @enderror

                    </div>

                    

                    <div class="form-group col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>

        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Add Doctor Experienced</h3>
            <form action="{{url('experience_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
                       <div class="form-group ">
                        <label for="department_id">Department</label>
                        <select name="department_id" id="department_id"  class="form-control experience"  >

                            <option value="">--Select Department--</option>
                            @foreach($department as $departments)
                            <option value="{{$departments->id}}">{{$departments->department_name}}</option>
                            @endforeach
                        </select>

                        @error('department')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					 
				    <div  class="form-group " >
                     <label for="designation" > Doctor </label>
					  <select name="doctor_id" id="designationexp" class="form-control" >
                           <option value="">--Select Doctor--</option>

                      </select>					  
                    </div>
					
                    <div class="form-group">
                        <label for="specialist">Experienced year</label>
                        <input type="text" name="exp_year" value="{{old('exp_year')}}" placeholder="Experienced year..." class="form-control" id="specialist">

                    </div>
                    <div class="form-group">
                        <label for="specialist">Experienced Department</label>
                        <input type="text" name="exp_department" value="{{old('exp_department')}}" placeholder="Experience department.." class="form-control" id="specialist">

                    </div>
                    <div class="form-group">
                        <label for="specialist">Experienced position</label>
                        <input type="text" name="exp_position" value="{{old('exp_position')}}" placeholder="Experienced position.." class="form-control" id="specialist">

                    </div>
                    <div class="form-group">
                        <label for="specialist">Experienced Hospital</label>
                        <input type="text" name="exp_hospital" value="{{old('exp_hospital')}}" placeholder="Experienced hospital.." class="form-control" id="specialist">

                    </div>


                   


                    <div class="form-group col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

        --

        --
    </div>
    <!-- /Widget Item -->

</div>
</div>
<!-- /Main Content -->

@endsection


@section('footer_script')
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
	
	
	
	
<script>
$(document).ready(function(){ 
    //add doctor dropdown 
    function call_designation(department_id){
            
              
              
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('designation.fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {   
						   document.getElementById("designationaaa").innerHTML =result ;
                       }

               })       
      }
	  $('.dynamic').change(function(){
		     var value = $(this).val();
			 
		     call_designation(value);
		  });
		  
		  
		  
	//doctor degree dropdown list	  
	 function call_doctor(department_id){
            
              
           
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('doctor.data_fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {    
						   document.getElementById("designationxxx").innerHTML =result ;
                       }

               })       
      }	  
	 $('.doctor').change(function(){
		     var value = $(this).val();
		     call_doctor(value);
		    
		  });	  
		
      //doctor experience dropdown list	  
	 function call_exp(department_id){
            
              
           
			  
               var _token = $('input[name="_token"]').val();
			   
               $.ajax({ 
                    url:"{{ route('doctor.data_fetch') }}",
                    method:"POST",
					data:{ department_id:department_id, _token:_token},
					
                    success:function(result)
                       {    
						   document.getElementById("designationexp").innerHTML =result ;
                       }

               })       
      }	  
	 $('.experience').change(function(){
		     var value = $(this).val();
		     call_exp(value);
		    
		  });	  
		   	 
    });





</script>
@endsection
