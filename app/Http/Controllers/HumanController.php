<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Human;
use App\Designation;
use App\Department;
use Image;

class HumanController extends Controller
{
    public function employee(){
        $designation = Designation::all();
        return view('admin.human.add_employee', compact('designation'));
    }
    public function employeepost(Request $request){
		
        $request->validate([
		    'department_id'  => 'required',
            'designation_id'  => 'required',
            'name'  => 'required',
			'qualification' => 'required',
			'subject' => 'required',
			'institution' => 'required',
			'experience' =>'required',
            'password'  => 'required',
            'mobile'  => 'required',
            'status'  => 'required',
            'email'=>'required|email|unique:humans',
			'priority' =>'required',
        ]);
		
        $form_db = Human::create([
		    'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id,
            'name'=>$request->name,
            'degree'=>$request->qualification,
			'subject'=>$request->subject,
			'institution'=>$request->institution,
			'experience'=>$request->experience,
            'email'=>$request->email,
            'password'=>$request->password,
            'mobile'=>$request->mobile,
            'gender'=>$request->gender,
            'address'=>$request->address,
            'status'=>$request->status,
			'priority' => $request->priority,
            'created_at' =>now(),
        ]);
        $uploaded_employee_photo = $request->file('picture');
        $new_employee_photo_name = $form_db->id.'.'.$uploaded_employee_photo->extension();
        $new_employee_photo_location = base_path('public/uploads/employee/'.$new_employee_photo_name);
        Image::make($uploaded_employee_photo)->resize(1347,800)->save($new_employee_photo_location);

        Human::find($form_db->id)->update([
            'picture'=> $new_employee_photo_name,
        ]);
        return back()->with('employee', 'Employee added successflly');
    }
    
    public function designation()
	{
		$designation = Designation::orderBy('created_at', 'desc')->get();
		return view('admin.human.designation', compact('designation'));
    }
	
	public function index()
	{
		$designations = Designation::orderBy('department_id', 'desc')->get();
		
		return view('admin.departments.designation.index',compact('designations'));
    }
	
	public function create(){
		$departments = Department::orderBy('created_at','desc')->get();
		
     return view('admin.departments.designation.create', compact('departments'));
	}
	
	public function store(Request $request){
		
		 Designation::insert([
          'department_id'=>$request->department_id,
         'designation'=>$request->designation,
		 'priority' => $request->priority,
        
        'created_at' => now(),
      ]);
      return back()->with('designation','Designation Added Successfully');
	}
	public function edit($id){
		 $designation = Designation::find($id);
        $departments = Department::orderBy('created_at','desc')->get();
      return view('admin.departments.designation.edit', compact('designation','departments'));
	}
	
	public function update(Request $request, $id){
		 $request->validate([
            'department_id'=> 'required',
        ]);
         Designation::find($id)->update([
         'department_id'=>$request->department_id,
         'designation'=>$request->designation,
		 'priority' => $request->priority,
         
      ]);
      return back()->with('designation_edit','Designation Edit Successfully');
	}
	  public function deletejobdesignation($id){
		 
	  Designation::find($id)->delete();
      return back()->with('designation_delete','Designation Delete Successfully');
	  }
	
	
	public function designationactive($sub_id){
      $designation_active = Designation::find($sub_id);
      if($designation_active->status == 0){
         Designation::find($sub_id)->update([
              'status'=>1,
          ]);
      }
      else{
            Designation::find($sub_id)->update([
                'status'=>0,
             ]);
            }
      return back()->with('designation_status','Designation status Successfully change');
  }
	
	
    public function designationPost(Request $request)
    {
        $request->validate([
            'designation'=>'required',
        ]);

        Designation::create([
            'designation'=>$request->designation,
            'created_at'=>now(),
        ]);
        return back()->with('designation_add', 'Successfully Done!  ');
    }
    public function designationDel($designation_id){
        Designation::where('id',$designation_id)->delete();
         return back()->with('user_delete', 'Delete Successfully Done! ');
     }

     public function singleEmployee($designation_id)
     {
        $singles = Human::where('designation_id',$designation_id)->get();
    	return view('admin.human.singleEmployee', compact('singles'));
    }
    public function employeeDel($employee_id){
       $del = Human::find($employee_id);
       if($del->picture != 'default_employee.jpg'){
                $location = base_path('public/uploads/employee/').$del->picture;
                unlink($location);
            }
       $del->delete();
        return back()->with('employee_delete', 'Successfully Done! ');
    }
	
	public function fetch(Request $request){
		
	
		 $designations =Designation::where('department_id', $request->department_id)->get();
		 $output = '<option value="">--Select Designation--</option>';
        foreach($designations as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->designation.'</option>';
        }
		echo  $output;
    
	   
	}
	public function fetch_doctor(Request $request){
		
	     
		 $doctors =Doctor::where('department', $request->department_id)->get();
		 $output = '<option value="">--Select Designation--</option>';
        foreach( $doctors as $row)
        {
         $output .= '<option value="'.$row->id.'">'.$row->doctor_name.'</option>';
        }
		echo  $output;
    
	   
	}

}
