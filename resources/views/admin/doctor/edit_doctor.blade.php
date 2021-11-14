@extends('layouts.dashboard')

@section('content')

<!-- Main Content -->
<div class="container-fluid">

<div class="row">
    <!-- Widget Item -->
    <div class="col-md-12">
        <div class="widget-area-2 proclinic-box-shadow">
            <h3 class="widget-title">Edit Doctor</h3>
            <form action="{{route('doctor.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
            {{method_field('PUT')}}
            @csrf
                
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Name</label>
                        <input type="text" class="form-control" name="doctor_name" value="{{$doctor->doctor_name}}" placeholder="Name" id="name">
                        @error('doctor_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                   
                   
					 <div class="form-group col-md-6">
                        <label for="dob">Depertment</label>
                        <select class="form-control dynamic" name="department_id" value="{{$doctor->department_id}}" >
                            <option value="">Select</option>
                            @foreach($deparments as $deparment)
                            <option value="{{$deparment->id}}" {{($deparment->id == $doctor->department)?'selected':' '}}    >{{$deparment->department_name}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" name="depertment" value="{{old('depertment')}}" placeholder="Depertment" class="form-control" id="dob"> -->
                        @error('department_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div  class="form-group col-md-6" >
                     <label for="designation" > Designation </label>
					  <select name="designation_id" id="designationaaa" class="form-control" >
                           @foreach($designations as $designation)
						      <option value="{{$designation->id}}" {{($designation->id ==$doctor->designation)?'selected':''}}>{{$designation->designation}}</option>
                          @endforeach
                      </select>					  
                    </div>
                    <div class="form-group col-md-6">
                        <label for="specialist">Specialist</label>
                        <input type="text" name="specialist" value="{{$doctor->specialist}}" placeholder="Specialist" class="form-control" id="specialist">
                        @error('specialist')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					 <div class="form-group col-md-6">
                        <label for="phone">Phone No</label>
                        <input type="text" name="phone_no" value="{{$doctor->phone_no}}" placeholder="Phone" class="form-control" id="phone">
                        @error('phone_no')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					 <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value="{{$doctor->email}}" placeholder="email" class="form-control" id="Email">
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea placeholder="Address" name="address" class="form-control" id="address" rows="3">{{$doctor->address}}</textarea>
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                   
                    
                    <div class="form-group col-md-6">
                        <label for="short_biography">Short Biography</label>
                        <textarea placeholder="Short Biography" name="short_biography" class="form-control" id="short_biography" rows="3">{{$doctor->short_biography}}</textarea>
                        @error('short_biography')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                   
                    <div class="form-group col-md-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{$doctor->date_of_birth}}" placeholder="Date of Birth" class="form-control" id="dob">
                        @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
					<div class="form-group col-md-6">
                        <label for="dob">Visibility Order(Priority)</label>
                        <input type="number" name="priority"  placeholder="Priority" value="{{$doctor->priority}}" class="form-control" id="priority">
                        @error('priority')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Sex</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="Male" {{$doctor->sex == "Male" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="Female" {{$doctor->sex == "Female" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="inlineRadio3" value="Other" {{$doctor->sex == "Other" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio3">Other</label>
                        </div>
                        @error('sex')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="blood_group">Blood Group</label>
                        <select class="form-control" name="blood_group" value="{{$doctor->blood_group}}" id="blood_group">
                            <option value="">Select</option>
                            <option value="A+" {{ ($doctor->blood_group == 'A+')?'selected' : ''}}    >A+</option>
                            <option value="A-" {{ ($doctor->blood_group == 'A-')?'selected' : ''}}>A-</option>
                            <option value="B+"{{ ($doctor->blood_group == 'B+')?'selected' : ''}}>B+</option>
                            <option value="B-"{{ ($doctor->blood_group == 'B-')?'selected' : ''}}>B-</option>
                            <option value="o+"{{ ($doctor->blood_group == 'o+')?'selected' : ''}}>0+</option>
                            <option value="o-" {{ ($doctor->blood_group == 'o-')?'selected' : ''}}>0-</option>
                            <option value="AB+"{{ ($doctor->blood_group == 'AB+')?'selected' : ''}}>AB+</option>
                            <option value="AB-"{{ ($doctor->blood_group == 'AB-')?'selected' : ''}}>AB-</option>
                        </select>
                        <!-- <input type="text" name="depertment" value="{{old('depertment')}}" placeholder="Depertment" class="form-control" id="dob"> -->
                        @error('blood_group')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
            
                    
                
                   

                    <div class="form-group col-md-6">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" {{$doctor->status == "1" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" {{$doctor->status == "0" ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Deactive</label>
                        </div>
                        @error('status')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Fee</label><br>
                       <input type="number" class="form-control" value="{{$doctor->fee}}" name="fee">
                        @error('fee')
                                <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <!-- <div class="form-group col-md-6">
                        <label for="">Working Days</label><br>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Sun">
                            <label for="checkbox2" class="p-1 mt-2">Sun</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Mon">
                            <label for="checkbox2" class="p-1 mt-2">Mon</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Tue">
                            <label for="checkbox2" class="p-1 mt-2">Tue</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Wed">
                            <label for="checkbox2" class="p-1 mt-2">Wed</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Thur">
                            <label for="checkbox2" class="p-1 mt-2">Thur</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Fri">
                            <label for="checkbox2" class="p-1 mt-2">Fri</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input id="checkbox2" type="checkbox" name="working_days[]" value="Sat">
                            <label for="checkbox2" class="p-1 mt-2">Sat</label>
                            </div>
                        </div> -->

                    <div class="form-group col-md-12">
                        <label for="file">Picture</label>
                        <input type="file" name="image" class="form-control" value="{{$doctor->image}}" id="file">
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
</div>
</div>
<!-- /Main Content -->

@endsection


@section('footer_script')
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
		  
	 });
	  
</script>
@endsection