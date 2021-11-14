<?php

namespace App\Http\Controllers;

use App\PatientDocumnet;
use Illuminate\Http\Request;

class PatientDocumnetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patientdocuments = PatientDocumnet::all();
        return view('admin.patient_document.all_document',compact('patientdocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patient_document.add_document');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new PatientDocumnet;
        if($request->file('patient_document')){
            $file = $request->file('patient_document');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->patient_document->move('uploads/patient_document/',$filename);
            $data->patient_document=$filename;
        }

        $data->patient_id = $request->patient_id;
        $data->doctor_name = $request->doctor_name;
        $data->description = $request->description;
        $data->save();
        return redirect('patient_document')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PatientDocumnet  $patientDocumnet
     * @return \Illuminate\Http\Response
     */
    public function show(PatientDocumnet $patientDocumnet)
    {
        
    }

    public function document_view($id){
        $data = PatientDocumnet::find($id);
        return view('admin.patient_document.view_document',compact('data'));
    }

    public function document_download($patient_document){
        return response()->download('uploads/patient_document/'.$patient_document);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PatientDocumnet  $patientDocumnet
     * @return \Illuminate\Http\Response
     */
    // public function edit(PatientDocumnet $patientDocumnet)
    // {
    //     return view('admin.patient_document.edit_document',compact('patientDocumnet'));
    // }

    public function patient_document_edit($id){
        $patientdocumnet = PatientDocumnet::find($id);
        return view('admin.patient_document.edit_document',compact('patientdocumnet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PatientDocumnet  $patientDocumnet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientDocumnet $patientDocumnet)
    {
        //
    }

    public function patient_document_update(Request $request){
        $patientdocumnet=PatientDocumnet::find($request->id);
        $patientdocumnet->patient_id=$request->input('patient_id');
        $patientdocumnet->doctor_name=$request->input('doctor_name');
        $patientdocumnet->description=$request->input('description');

        if($request->hasFile('patient_document')){
            if($patientdocumnet->patient_document != 'patient_document_default.jpg'){
                $delete_location = base_path('public/uploads/patient_document/'.$patientdocumnet->patient_document);
                unlink($delete_location);
            }
        }
        $file = $request->file('patient_document');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->patient_document->move('uploads/patient_document/',$filename);
        $patientdocumnet->patient_document=$filename;
        $patientdocumnet->save();
        return redirect('patient_document')->with('edit_success',' ');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PatientDocumnet  $patientDocumnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientDocumnet $patientDocumnet)
    {
        //
    }

    public function patient_delete($id){
        PatientDocumnet::find($id)->delete();
        return back()->with('delete_success',' ');
    }
}
