@extends('layouts.dashboard')

@section('birth')
active

@endsection


@section('breadcrumb')

    <div class="col-md-6">
        <h3 class="block-title">Hospital Activities</h3>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">
                    <span class="ti-home"></span>
                </a>
            </li>
            <li class="breadcrumb-item">Birth Register</li>
            <li class="breadcrumb-item active">Register</li>
        </ol>
    </div>

@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <!-- Widget Item -->
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" style="margin-top: 20px" role="alert">
                <strong>Successfully Done!</strong> {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            @endif
            @if(session('Update'))
            <div class="alert alert-success alert-dismissible fade show" style="margin-top: 20px" role="alert">
                <strong>Successfully Done!</strong> {{session('Update')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            @endif

            @if(session('Delete'))
            <div class="alert alert-warning alert-dismissible fade show" style="margin-top: 20px" role="alert">
                <strong>Successfully Delete!</strong> {{session('Delete')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>


            @endif

            <div class="widget-area-2 proclinic-box-shadow">
                <h3 class="widget-title">Birth Register list</h3>
                <div class="form-group col-md-12 mb-3" style="text-align: end">
                    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#add"><span>+ </span>   Add</button>
                </div>
                <div class="table-responsive mb-3">
                    <table id="table_id" class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th>SL</th>
                                <th>Born ID</th>
                                <th> Name</th>
                                <th> Mother Id</th>
                                <th> Mother Name</th>
                                <th> Father Name</th>
                                <th> Date Of Birth</th>
                                <th>Added By</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($birth as $birth)
                            <tr>
                                <td  style="text-align: center">{{ $sl++ }}</td>
                                <td  style="text-align: center">IM- {{ $birth->new_born_id }}</td>
                                <td  style="text-align: center">{{ $birth->name }}</td>
                                <td  style="text-align: center">IM- {{ $birth->mothers_id }}</td>
                                <td  style="text-align: center">{{ $birth->mother_name }}</td>
                                <td  style="text-align: center">{{ $birth->father_name }}</td>
                                <td  style="text-align: center">{{ $birth->dateofbirth }} {{ $birth->timeofbirth }}</td>
                                <td  style="text-align: center">{{ $birth->connect_to_users_table->name}}</td>
                                <td  style="text-align: center">{{ $birth->created_at->format('d-M-y') }}</td>

                                {{-- <td>
                                    <span class="badge badge-success">Available</span>
                                </td> --}}
                                <td class="text-center" style="display:inline-flex">
                                    {{-- <a href=""><button type="button" class="btn btn-info mb-0"><span class="ti-eye"></span></button></a> --}}
                                    <a href="{{route('birth.edit',$birth->id)}}"type="submit" title="View" name="button" class="btn btn-info mt-0 mb-0"><span class="ti-eye"></span></a>
                                    <a href=""type="submit"data-toggle="modal" data-target="#{{$birth->id}}" title="Edit" name="button" class="btn btn-primary mt-0 mb-0"><span class="ti-pencil-alt"></span></a>
                                    <a href="{{url('birth_delete')}}/{{$birth->id}}" type="submit" title="Delete" onclick="alert('Are you Sure!')" class="btn btn-danger mt-0 mb-0"><span class="ti-trash"></span></a>
                                </td>

                            </tr>

{{-- -------------------------Edit Modal --}}
<div class="modal fade " id="{{$birth->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="widget-title" id="exampleModalLongTitle">Birth Register </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('birth.update',$birth->id)}}" method="POST" enctype="multipart/form-data">
                {{method_field('PUT')}}
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="new_born_id"> New Born Id</label>
                            <input type="text" class="form-control" name="new_born_id" value="{{$birth->new_born_id}}" placeholder="IM-008899" id="new_born_id" required>
                            @error('doctor_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name"> Name </label>
                            <input type="text" class="form-control" name="name" value="{{$birth->name}}" placeholder="Name" id="name" required>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dateofbirth" value="{{ $birth->dateofbirth }}" placeholder="Date of Birth" class="form-control" id="dob" required>
                            @error('date_of_birth')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="timeofbirth">Time Of Birth</label>
                            <input type="time" name="timeofbirth" value="{{$birth->timeofbirth}}" placeholder="Time of Birth" class="form-control" id="tob" required>
                            @error('timeofbirth')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="{{$birth->gender}}">{{$birth->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="motherid">Mother's Id</label>
                            <input type="text" name="mothers_id" value="{{$birth->mothers_id}}" placeholder="Mother's Id" class="form-control" id="mothers_id" required>
                            @error('mothers_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" name="mother_name" value="{{$birth->mother_name}}" placeholder="Mother Name" class="form-control" id="mother_name" required>
                            @error('mother_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_nationality">Mother Nationality</label>
                            <select class="form-control" name="mother_nationality" id="mother_nationality"value="{{$birth->mother_nationality}}" required>
                                <option  ><---Selected Country---></option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                            </select>

                            @error('mother_nationality')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_religion">Religion</label>
                            <select class="form-control" name="mother_religion"value="{{$birth->mother_religion}}"id="mother_religion" required>
                                <option  ><---Selected Religion---></option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="mother_religion" value="{{old('mother_religion')}}" placeholder="Religion" class="form-control" id="mother_religion"> --}}
                            @error('mother_religion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" name="father_name" value="{{$birth->father_name}}" placeholder="Father Name" class="form-control" id="father_name" required>
                            @error('father_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_nationality">Father Nationality</label>
                            <select class="form-control" name="father_nationality" value="{{$birth->father_nationality}}" id="father_nationality" required>
                                <option value="{{$birth->father_nationality}}">{{$birth->father_nationality}}</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                            </select>
                            {{-- <input type="text" name="father_nationality" value="{{old('father_nationality')}}" placeholder="Nationality" class="form-control" id="father_nationality"> --}}
                            @error('father_nationality')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_religion">Religion</label>
                            <select class="form-control" name="father_religion"value="{{$birth->father_religion}}"id="father_religion" required>
                                <option> <---Selected Religion---> </option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="father_religion" value="{{old('father_religion')}}" placeholder="Religion" class="form-control" id="father_religion"> --}}
                            @error('father_religion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="present_address">Present Address</label>
                            <textarea placeholder="Present Address" name="present_address"  class="form-control" id="present_address" rows="1" required>{{$birth->present_address}}</textarea>
                            @error('present_address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="permanent_address">Permanent Address</label>
                            <textarea placeholder="Present Address" name="permanent_address" value="" class="form-control" id="permanent_address" rows="1" required>{{$birth->permanent_address}}</textarea>
                            @error('permanent_address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>
                </form>

      </div>
    </div>
</div>

{{-- -------------------------End Edit Modal --}}






                            @endforeach




                        </tbody>
                    </table>

                    <!--Export links-->

                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center export-pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-download"></span> csv</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-printer"></span>  print</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-file"></span> PDF</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"><span class="ti-align-justify"></span> Excel</a>
                            </li>
                        </ul>
                    </nav> --}}
                    <!-- /Export links-->

                    {{-- <button type="button" class="btn btn-danger mt-3 mb-0"><span class="ti-trash"></span> DELETE</button>
                    <button type="button" class="btn btn-primary mt-3 mb-0"><span class="ti-pencil-alt"></span> EDIT</button> --}}
                </div>
            </div>
        </div>
        <!-- /Widget Item -->



<!-- Modal -->
<div class="modal fade " id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="widget-title" id="exampleModalLongTitle">Birth Register </h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('birth.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="form-group  col-md-6">
                            <label for="new_born_id"> New Born Id</label>
                            <input type="text" class="form-control"  rel="gi" data-size="8" data-character-set="0-9," name="new_born_id" value="{{old('new_born_id')}}" placeholder="IM-008899" id="new_born_id" required>
                            <span class="input-group-btn" style="position: absolute; top:34px; right:7px;"><button type="button" class="btn btn-default getNewPass"><span class="ti-reload"></span></button></span>
                            @error('doctor_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name"> Name </label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" id="name" required>
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dateofbirth" value="{{old('dateofbirth')}}" placeholder="Date of Birth" class="form-control" id="dob" required>
                            @error('date_of_birth')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="timeofbirth">Time Of Birth</label>
                            <input type="time" name="timeofbirth" value="{{old('timeofbirth')}}" placeholder="Time of Birth" class="form-control" id="tob" required>
                            @error('timeofbirth')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" value="{{old('gender')}}" id="gender" required>
                                <option  >Selected Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="motherid">Mother's Id</label>
                            <input type="text" name="mothers_id" rel="gi" data-size="8" data-character-set="0-9," value="{{old('mothers_id')}}" placeholder="Mother's Id" class="form-control" id="mothers_id" required>

                            <span class="input-group-btn" style="position: absolute; top:34px; right:7px;"><button type="button" class="btn btn-default getNewPass"><span class="ti-reload"></span></button></span>
                            @error('mothers_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_name">Mother Name</label>
                            <input type="text" name="mother_name" value="{{old('mother_name')}}" placeholder="Mother Name" class="form-control" id="mother_name" required>
                            @error('mother_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_nationality">Mother Nationality</label>
                            <select class="form-control" name="mother_nationality" id="mother_nationality"value="{{old('mother_nationality')}}" required>
                                <option ><---Selected Country---></option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                            </select>

                            @error('mother_nationality')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mother_religion">Religion</label>
                            <select class="form-control" name="mother_religion"value="{{old('mother_religion')}}"id="mother_religion" required>
                                <option><---Selected Religion---></option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="mother_religion" value="{{old('mother_religion')}}" placeholder="Religion" class="form-control" id="mother_religion"> --}}
                            @error('mother_religion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="father_name">Father Name</label>
                            <input type="text" name="father_name" value="{{old('father_name')}}" placeholder="Father Name" class="form-control" id="father_name" required>
                            @error('father_name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_nationality">Father Nationality</label>
                            <select class="form-control" name="father_nationality" value="{{old('father_nationality')}}" id="father_nationality" required>
                                <option selected >Selected Country</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                            </select>
                            {{-- <input type="text" name="father_nationality" value="{{old('father_nationality')}}" placeholder="Nationality" class="form-control" id="father_nationality"> --}}
                            @error('father_nationality')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="father_religion">Religion</label>
                            <select class="form-control" name="father_religion"value="{{old('father_religion')}}"id="father_religion" required>
                                <option><---Selected Religion---></option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                            {{-- <input type="text" name="father_religion" value="{{old('father_religion')}}" placeholder="Religion" class="form-control" id="father_religion"> --}}
                            @error('father_religion')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="present_address">Present Address</label>
                            <textarea placeholder="Present Address" name="present_address" value="{{old('present_address')}}" class="form-control" id="present_address" rows="1" required></textarea>
                            @error('present_address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="permanent_address">Permanent Address</label>
                            <textarea placeholder="Present Address" name="permanent_address" value="{{old('permanent_address')}}" class="form-control" id="permanent_address" rows="1" required></textarea>
                            @error('permanent_address')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                    </div>


                </form>

      </div>
    </div>
</div>




 @endsection

 @section('footer_script')
 <script>
    // Generate
    function randString(id){
      var dataSet = $(id).attr('data-character-set').split(',');
      var possible = '';
      if($.inArray('0-9', dataSet) >= 0){
        possible += '0123456789';
      }
      var text = '';
      for(var i=0; i < $(id).attr('data-size'); i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
      }
      return text;
    }

    // Create a new password on page load
    $('input[rel="gi"]').each(function(){
      $(this).val(randString($(this)));
    });

    // Create a new password
    $(".getNewPass").click(function(){
      var field = $(this).closest('div').find('input[rel="gi"]');
      field.val(randString(field));
    });

    // Auto Select Pass On Focus
    $('input[rel="gi"]').on("click", function () {
       $(this).select();
    });

    </script>

 @endsection
             {{-- <form action="" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="Doctor-name">Item Name</label>
                        <input type="text" name="items_name" class="form-control" placeholder="Item name" id="Item-name" class="form-control @error('items_name') is-invalid @enderror" nvalue="{{ old('items_name') }}" required autocomplete="items_name" autofocus placeholder=" class="form-control @error('items_name') is-invalid @enderror" value="{{ old('items_name') }}" required autocomplete="items_name" autofocus placeholder="items name"">

                        @error('items_name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>


                    <div class="form-check col-md-12 mb-2">
                        <div class="text-left">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="ex-check-2">
                                <label class="custom-control-label" for="ex-check-2">Please Confirm</label>
                            </div>
                        </div>
                    </div>
                     <div class="form-group col-md-6 mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form> --}}
