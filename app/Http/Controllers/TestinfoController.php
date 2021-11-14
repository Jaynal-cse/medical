<?php

namespace App\Http\Controllers;

use App\Testinfo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Department;
use App\Doctor;
use App\Test;
use App\Patient;

class TestinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $testinfos = Testinfo::all();
        return view('admin.test.testinfo.index',compact('testinfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now()->format('Y-m-d');
		$appointment_today =Testinfo::where('created_at','LIKE',$date.'%')->count();
	    $today=Carbon::now()->format('Ymd');//$today is 8 digits
		$today=$today*1000000;//Make $today 14 digits 
		$CurrentId=$today+$appointment_today+1;
		$rand_number = rand(10,99);
		$CurrentFinalIdWillBe=($CurrentId*100)+$rand_number;
		//dd($CurrentFinalIdWillBe);
		
		//dd($CurrentIdWillBe);
     	$depts = Department::all();
        $doctor = Doctor::all();
        $departmentWiseTests = array();
      

        foreach($depts as $dept){
              $tests = Test::where('department',$dept->id)->where('status',1)->orderBy('priority','asc')->get();
              $content = count($tests);
              if($content != 0){
              $departmentWiseTests[$dept->id]=$tests ;
             
              }
        }
       
        
    	return view('admin.test.testinfo.create', compact('depts', 'doctor','CurrentFinalIdWillBe','departmentWiseTests'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $request->validate([
            
            'phone_no'=>'required',
            'name'=>'required',
			'age' =>'required',
			'blood_group' => 'required',
			'doctor_id' => 'required',
            'test_id'=>'required',                        
        ]);
        $date = Carbon::now()->format('Y-m-d');
        $patient_today = Patient::where('created_at','LIKE',$date.'%')->count();
		$today=Carbon::now()->format('Ymd');
		$patient_id = ($today*1000000)+$patient_today+1;
		
		$patientExists=Patient::where('phone_no',$request->phone_no)->where('name',$request->name)->first();
		
		if(isset($patientExists)){
			
			$patientExists->age=$request->age;
			$patientExists->blood_group=$request->blood_group;
			$patientExists->save();
            $patient_id=$patientExists->patient_id;
		}else{
            
        Patient::insert([
        	
            'patient_id' =>$patient_id,
			'phone_no' => $request->phone_no,
            'name' => $request->name,
			'age' => $request->age,
			'blood_group' => $request->blood_group,
            'created_at'=>Carbon::now(),
        ]);
        
		}
       
       $testName = implode('|',$request->test_id);
      
        Testinfo::insert([
        	
            'test_id'=>$request->appointment_id,
			'patient_id' =>$patient_id,
            'test_name' => $testName,
			'phone_no' => $request->phone_no,
            'doctor_id'=>$request->doctor_id,
            'amount' =>$request->payable,
            'advance'=>$request->advance,
            'discount'=>$request->discount,
            'created_at'=>Carbon::now(),
        ]);
      //return redirect()->route('testinfo.index')->with('test_add','Diagonosis Added Successfully');

      $testName = Testinfo::where('test_id',$request->appointment_id)->first();
      $testArray = explode('|', $testName->test_name);
      $patient = Patient::where('patient_id',$testName->patient_id)->first();
      $testFee=0;
      for($i=0;$i<count($testArray);$i++){
          $tests[$i]=Test::select('id','name','fee','room_no')->where('id',$testArray[$i])->first();
          $testFee +=$tests[$i]->fee;
      }
        return view('admin.test.testinfo.invoice',compact('tests','testName','testFee','patient'));
     // return redirect()->route('')
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testinfo  $testinfo
     * @return \Illuminate\Http\Response
     */
    public function show(Testinfo $testinfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testinfo  $testinfo
     * @return \Illuminate\Http\Response
     */
    public function edit(Testinfo $testinfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testinfo  $testinfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testinfo $testinfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testinfo  $testinfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testinfo $testinfo)
    {
        //
    }

    public function voucher(){
    

       $tests = Test::all();
       
       return view('admin.test.testinfo.voucher',compact('tests'));
    }
    public function fetch_test(Request $request){
        

        $idArray = explode('|',$request->testString);
        $totalFee = 0;
        
        for($i=0; $i<(count($idArray)-1); $i++){
            $test =Test::where('id',$idArray[$i])->first();
            
            $totalFee +=$test->fee;
        }
           
        
		
        //$output = '<input type="number" name="fee" class="form-control" value="'.$totalFee.'">';
       
      
       echo  $totalFee;

    }

    public function invoice($id){
        $testName = Testinfo::where('id',$id)->first();
        $testArray = explode('|', $testName->test_name);
        $patient = Patient::where('patient_id',$testName->patient_id)->first();
        $testFee=0;
        for($i=0;$i<count($testArray);$i++){
            $tests[$i]=Test::select('id','name','fee','room_no')->where('id',$testArray[$i])->first();
            $testFee +=$tests[$i]->fee;
        }
        return view('admin.test.testinfo.invoice',compact('tests','testName','testFee','patient'));
    }
    
}
