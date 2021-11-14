@extends('layouts.frontend')
@section('breadcrumb')
          <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common inner-page-top-margin" data-bg-image="img/figure/figure2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Appointment Form</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>Form</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
@endsection

@section('content')
     <!-- Gallery Area Start Here -->
        <section class="appointment-wrap-layout1 bg-light-accent100">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <h5><strong class="pt-1 pb-1">{{session('success')}}</strong></h5>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif

            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-6">
                        <div class="appointment-box-layout1">
                            <h2 class="title title-bar-primary2">Make an Appointment</h2>
                            <p>Efficiently myocardinate market-driven innovation via open-source alignments.
                                Dramatically engage
                                porescently.</p>
                            <form action="{{url('appointment_post')}}" method="post">
                                @csrf
                                <div class="row gutters-15">
                                   <input type="hidden" name="status">

                                    <div class="col-12 form-group">
                                      <small class="text-danger">Auto generated field</small>
                                        <input type="text" class="form-control" rel="app" data-size="10" data-character-set="0-9" name="appointment_id">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                     <div class="col-12 form-group">
                                        <select class="form-control" name="department_id">
                                            <option value="">Select Department *</option>
                                            @foreach($depts as $dept)
                                                <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('department_id')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 form-group">
                                        <select class="form-control" name="doctor_id">
                                            <option value="">Select Doctor *</option>
                                            @foreach($doctor as $doct)
                                                <option value="{{$doct->id}}">{{$doct->first_name}} {{$doct->last_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="text" placeholder="Patient Name *" class="form-control" name="name"
                                            id="form-name" data-error="Name field is required" required>
                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" placeholder="Phone *" class="form-control" name="phone">
                                        <div class="help-block with-errors"></div>
                                        @error('phone')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" placeholder="E-mail *" class="form-control" name="email" id="form-email"
                                            data-error="E-mail field is required" required>
                                        @error('email')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="date" class="form-control" name="date">
                                        @error('date')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <input type="time" class="form-control rt-time" placeholder="Time *" name="time"
                                            id="form-time" data-error="Subject field is required" required />
                                        @error('time')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea placeholder="Problem" class="textarea form-control" name="problem"
                                            id="form-message" rows="5" cols="20" data-error="Message field is required"
                                            required></textarea>
                                            @error('problem')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                    </div>
                                    <div class="col-12 form-group text-center">
                                        <button class="item-btn">Make an Appointment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="appointment-banner">
                            <img src="{{asset('frontend_assets/img/figure/figure2.png')}}" alt="appointment" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Gallery Area End Here -->
@endsection

@section('footer_script')
  <script>
    // Generate a password string
function randString(id){
  var dataSet = $(id).attr('data-character-set').split(',');
  var possible = '';
  if($.inArray('a-z', dataSet) >= 0){
    possible += 'abcdefghijklmnopqrstuvwxyz';
  }
  if($.inArray('A-Z', dataSet) >= 0){
    possible += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  }
  if($.inArray('0-9', dataSet) >= 0){
    possible += '0123456789';
  }
  if($.inArray('#', dataSet) >= 0){
    possible += '![]{}()%&*$#^<>~@|';
  }
  var text = '';
  for(var i=0; i < $(id).attr('data-size'); i++) {
    text += possible.charAt(Math.floor(Math.random() * possible.length));
  }
  return text;
}

// Create a new password on page load
$('input[rel="app"]').each(function(){
  $(this).val(randString($(this)));
});

// Create a new password
$(".getNewPass").click(function(){
  var field = $(this).closest('div').find('input[rel="app"]');
  field.val(randString(field));
});

// Auto Select Pass On Focus
$('input[rel="app"]').on("click", function () {
   $(this).select();
});

</script>
@endsection
