@extends('layouts.dashboard')


<style>
.container {
   
    padding-top: 30px;
    padding-left: 15%;
}
.table {
    
    font-size: 10px;
}
  .body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff;
 }

 .img {
     height: 100px;
 }

 h1 {
     text-align: center;
 }
 p { 
     font-weight:400;
    font-size: 1em;
    line-height: 0.7em;
    
}
</style>
@section('breadcrumb') 
<div class="col-md-6">
    <h3 class="block-title">Invoice</h3>
</div>
<div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('home')}}">
                    <span class="ti-home"></span>
                </a>
      </li>
       <li class="breadcrumb-item"><a href="">Home</a></li>
       <li class="breadcrumb-item"><a href="">Diagonosis</a></li>
        <li class="breadcrumb-item active">All Diagonosis</li>
</div>
@endsection

@section('content')
<div class="container" id="printJS-form">
                    
                 
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2">Invoice ID</div>
                        <div class="col-md-10">{{$testName->test_id}}</div> 
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2">Patient ID</div>
                        <div class="col-md-10">{{$testName->patient_id}}</div> 
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2"> Name</div>
                        <div class="col-md-10">{{$patient->name}}</div>
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2">Phone Number</div>
                        <div class="col-md-10">{{$patient->phone_no}}</div>
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2">Total Test</div>
                        <div class="col-md-10">{{count($tests)}}</div>
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
                        <div class="col-md-2">Deliver Time</div>
                        <div class="col-md-10">6:00PM</div>
                    </div>
                    <div class="row" style="font-size:12px;font-weight:normal">
					    <div class="col-md-2">Deliver Date</div>
                        <div class="col-md-10"><?php echo date('d M, Y'); ?></div>
                    </div>
                   </td>
                   
                    <br>
                       <table style="background:#80808024;" class="table ">
    
    
    <tr>
        <td >Test Name</td>
        <td>Room No.</td>
        <td>Amount</td>
    </tr>
      <?php  for($i=0;$i<count($tests);$i++) {  ?>
                                     
    <tr >
                                     
        <td>{{$tests[$i]->name}}</td>
        <td>{{$tests[$i]->room_no}}</td>
        <td >৳ {{$tests[$i]->fee}} </td>
                                    
    </tr>
                                     
    <?php } ?> 
    <tr>
        <td  colspan="2" style="text-align:right;padding-right:10%">Total Amount</td>
        
        <td>৳  {{$testFee}}</td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:right;padding-right:10%">Discount</td>
        
        <td>{{$testName->discount}}%</td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:right;padding-right:10%">Payable Amount</td>
        
        <td>৳ {{$testName->amount}}</td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:right;padding-right:10%">Advance</td>
        
        <td>৳ {{$testName->advance}}</td>
    </tr>
    <tr>
        <td  colspan="2" style="text-align:right;padding-right:10%">Due</td>
        
        <td>৳ <?php $due=$testName->amount - $testName->advance; echo $due;  ?></td>
    </tr>

</tbody></table>
    <br><br>
  <div class="row">
      <div class="col-md-9">Date:<?php echo date('d M,Y')?></div>
      <div class="col-md-3" >Signature</div>
  </div>

                   
                 
                    
     
</div><br><br>
<button type="button" class="btn btn-primary" style="margin-left:1.5%" onclick="aaaa()">
    Print
 </button> 
@endsection

<script>
  function aaaa(){
    printJS({
        printable:'printJS-form',
        type:'html',

        header: '<br><m class="custom-p">Icon Hospital and Diagonostics Ltd</m><br><m class="custom-subtext">Phone:01725506692    Email:babu@gmail.com</m><br><m class="custom-location">Chandona,Chowrasta   Gazipur</m><hr><br><br>',
        style: '.custom-p { color:grey;font-weight:700;font-size:45px;padding-left:4%;letter-spacing:2px;line-height:55px} .custom-subtext{color:grey;font-weight:600;font-size:25px;padding-left:16%;letter-spacing:2px;line-height:40px} .custom-location{color:grey;font-weight:600;font-size:25px;padding-left:22%;letter-spacing:2px;line-height:40px}',
       
    });
  }
    </script>