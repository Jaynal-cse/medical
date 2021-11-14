<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Birth;
use App\Death;
use App\Operation;
use App\Medicategory;
use App\Medicine;
use Carbon\Carbon;

class HospitalActController extends Controller
{
	//Birth part start
   public function birth()
	{
		$births = Birth::all();
		return view('admin.hospitalAct.birth', compact('births'));
	}

	public function addBirth()
	{
		return view('admin.hospitalAct.add-birth');
	}

	public function birthPost(Request $request)
	{
		$request->validate([
            'patient_id'=>'required|unique:births',
            'date'=>'required',
            'title'=>'required',
        ]);

       Birth::insert([
        	'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
       return redirect('birth')->with('birth_add', 'Birth Report Added Successfully!');
	}
	public function birthView($birth_id){
        $view = Birth::find($birth_id);
        return view('admin.hospitalAct.birth-view', compact('view'));
    }
	public function birthEdit($birth_id)
	{
		$birth = Birth::find($birth_id);
		return view('admin.hospitalAct.birth-edit', compact('birth'));
	}

	public function birthEditPost(Request $request){

        $request->validate([
            'patient_id'=>'required',
            'date'=>'required',
            'title'=>'required',
        ]);
      
     Birth::find($request->birth_id)->update([
        'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
      ]);
     return redirect('birth')->with('birth_update', 'Birth Report Updated Successfully!');
    }

    public function birthDel($birth_id){
       Birth::where('id',$birth_id)->delete();
        return back()->with('birth_delete', 'Birth Report Item Deleted Successfully!');
    }


    //death part start
    public function death()
	{
		$deaths = Death::all();
		return view('admin.hospitalAct.death', compact('deaths'));
	}

	public function addDeath()
	{
		return view('admin.hospitalAct.death-add');
	}
	public function deathPost(Request $request)
	{
		$request->validate([
            'patient_id'=>'required|unique:deaths',
            'date'=>'required',
            'title'=>'required',
        ]);

       Death::insert([
        	'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
       return redirect('death')->with('death_add', 'Death Report Added Successfully!');
	}
	public function deathView($death_id){
        $view = Death::find($death_id);
        return view('admin.hospitalAct.death-view', compact('view'));
    }


	public function deathEdit($death_id)
	{
		$death = Death::find($death_id);
		return view('admin.hospitalAct.death-edit', compact('death'));
	}

	public function deathEditPost(Request $request){

        $request->validate([
            'patient_id'=>'required',
            'date'=>'required',
            'title'=>'required',
        ]);
      
     Death::find($request->death_id)->update([
        'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
      ]);
     return redirect('death')->with('death_update', 'Death Report Updated Successfully!');
    }

    public function deathDel($death_id){
       Death::where('id',$death_id)->delete();
        return back()->with('death_delete', 'Death Report Item Deleted Successfully!');
    }


    //Operation section start
     public function operation()
	{
		$operations = Operation::all();
		return view('admin.hospitalAct.operation', compact('operations'));
	}

	public function addOperation()
	{
		return view('admin.hospitalAct.operation-add');
	}

	public function operationPost(Request $request)
	{
		$request->validate([
            'patient_id'=>'required|unique:operations',
            'date'=>'required',
            'title'=>'required',
        ]);

       Operation::insert([
        	'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
       return redirect('operation')->with('operation_add', 'Operation Report Added Successfully!');
	}
	public function operationView($operation_id){
        $view = Operation::find($operation_id);
        return view('admin.hospitalAct.operation-view', compact('view'));
    }


	public function operationEdit($operation_id)
	{
		$operation = Operation::find($operation_id);
		return view('admin.hospitalAct.operation-edit', compact('operation'));
	}

	public function operationEditPost(Request $request){

        $request->validate([
            'patient_id'=>'required',
            'date'=>'required',
            'title'=>'required',
        ]);
      
     Operation::find($request->operation_id)->update([
        'patient_id'=>$request->patient_id,
            'date'=>$request->date,
            'title'=>$request->title,
            'description'=>$request->description,
            'doctor_name'=>$request->doctor_name,
            'status'=>$request->status,
      ]);
     return redirect('operation')->with('operation_update', 'Operation Report Updated Successfully!');
    }

    public function operationDel($operation_id){
       Operation::where('id',$operation_id)->delete();
        return back()->with('operation_delete', 'Operation Report Item Deleted Successfully!');
    }


    //Medicine Category section start
    public function medicineCategory()
	{
		$medicat = Medicategory::all();
		return view('admin.hospitalAct.mediCategory', compact('medicat'));
	}
	public function addMediCategory()
	{
		return view('admin.hospitalAct.mediCategory-add');
	}
	public function mediCategoryPost(Request $request)
	{
		$request->validate([
            'category_name'=>'required|unique:medicategories',
        ]);

       Medicategory::insert([
        	'category_name'=>$request->category_name,
            'description'=>$request->description,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
       return redirect('medicineCategory')->with('medicat_add', 'Medicine Category Added Successfully!');
	}
	public function mediCategoryView($medicat_id){
        $view = Medicategory::find($medicat_id);
        return view('admin.hospitalAct.mediCategory-view', compact('view'));
    }


	public function mediCategoryEdit($medicat_id)
	{
		$medicats = Medicategory::find($medicat_id);
		return view('admin.hospitalAct.mediCategory-edit', compact('medicats'));
	}

	public function mediCategoryEditPost(Request $request){

        $request->validate([
            'category_name'=>'required',
        ]);
      
     Medicategory::find($request->medicat_id)->update([
        'category_name'=>$request->category_name,
         'description'=>$request->description,
         'status'=>$request->status,
      ]);
     return redirect('medicineCategory')->with('medicat_update', 'Medicine Category Updated Successfully!');
    }

    public function mediCategoryDel($medicat_id){
       Medicategory::where('id',$medicat_id)->delete();
        return back()->with('medicat_delete', 'Medicine Category Item Deleted Successfully!');
    }


    //Medicine section start
     public function medicine()
	{
		$medicines = Medicine::all();
		return view('admin.hospitalAct.medicine', compact('medicines'));
	}
	public function addMedicine()
	{
		$medicat = Medicategory::all();
		return view('admin.hospitalAct.medicine-add', compact('medicat'));
	}
	public function medicinePost(Request $request)
	{
		$request->validate([
            'medicine_name'=>'required',
            'category_name'=>'required',
        ]);

       Medicine::insert([
        	'medicine_name'=>$request->medicine_name,
        	'category_name'=>$request->category_name,
            'price'=>$request->price,
            'description'=>$request->description,
            'manufactured_by'=>$request->manufactured_by,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),
        ]);
       return redirect('medicine')->with('medicine_add', 'Medicine Information Added Successfully!');
	}
	public function medicineView($medicine_id){
        $view = Medicine::find($medicine_id);
        return view('admin.hospitalAct.medicine-view', compact('view'));
    }


	public function medicineEdit($medicine_id)
	{
		$medicine = Medicine::find($medicine_id);
		$medicat = Medicategory::all();
		return view('admin.hospitalAct.medicine-edit', compact('medicine', 'medicat'));
	}

	public function medicineEditPost(Request $request){

        $request->validate([
            'medicine_name'=>'required',
            'category_name'=>'required',
        ]);
      
     Medicine::find($request->medicine_id)->update([
        'medicine_name'=>$request->medicine_name,
        	'category_name'=>$request->category_name,
            'price'=>$request->price,
            'description'=>$request->description,
            'manufactured_by'=>$request->manufactured_by,
            'status'=>$request->status,
      ]);
     return redirect('medicine')->with('medicine_update', 'Medicine Information Updated Successfully!');
    }

    public function medicineDel($medicine_id){
       Medicine::where('id',$medicine_id)->delete();
        return back()->with('medicine_delete', 'Medicine Item Deleted Successfully!');
    }

}
