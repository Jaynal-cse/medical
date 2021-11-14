<?php

namespace App\Http\Controllers;

use App\FrontendSection5Department;
use Illuminate\Http\Request;
use Image;

class FrontendSection5DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontend_departments = FrontendSection5Department::all();
        return view('admin.FrontendSection_5_Department.item.index',compact('frontend_departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FrontendSection_5_Department.item.create');
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
            'service_name' => 'required',
        ]);
        $return_form_db = FrontendSection5Department::create([
            'service_name'        => $request->service_name,
            'service_name_link'        => $request->service_name_link,
            'description'        => $request->description,
            'icon'                   => $request->icon,
            'sub_title'              => $request->sub_title,
            'in_picture_button_text' => $request->in_picture_button_text,
            'in_picture_button_link' => $request->in_picture_button_link,
            'price' => $request->price,
        ]);
        
        if ($request->hasFile('image')) {
            $uploaded_photo = $request->file('image');
            $new_photo_name = $return_form_db->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/frontend_department/'.$new_photo_name);
            Image::make($uploaded_photo)->save($new_photo_location);
            FrontendSection5Department::find($return_form_db->id)->update([
                'image'=>$new_photo_name,
        ]);
        }

        return redirect('frontend_department')->with('added_success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendSection5Department  $frontendSection5Department
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendSection5Department $frontendDepartment)
    {
        return view('admin.FrontendSection_5_Department.item.view', compact('frontendDepartment')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendSection5Department  $frontendSection5Department
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendSection5Department $frontendDepartment)
    {
        return view('admin.FrontendSection_5_Department.item.edit',compact('frontendDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendSection5Department  $frontendSection5Department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendSection5Department $frontendDepartment)
    {
        $request->all();
        if($request->hasFile('image')) {
            if ($frontendDepartment->image != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/frontend_department/' . $frontendDepartment->image);
                unlink($delete_location);
            }

            $uploaded_photo = $request->file('image');
            $new_photo_name = $frontendDepartment->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/frontend_department/'.$new_photo_name);
            Image::make($uploaded_photo)->save($new_photo_location);
            $frontendDepartment->image = $new_photo_name;
        }

        $frontendDepartment->service_name           = $request->service_name;
        $frontendDepartment->service_name_link      = $request->service_name_link;
        $frontendDepartment->description            = $request->description;
        $frontendDepartment->icon                   = $request->icon;
        $frontendDepartment->sub_title              = $request->sub_title;
        $frontendDepartment->in_picture_button_text = $request->in_picture_button_text;
        $frontendDepartment->in_picture_button_link = $request->in_picture_button_link;
        $frontendDepartment->price                  = $request->price;
        $frontendDepartment->save();

        return redirect('frontend_department')->with('edit_success', ' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendSection5Department  $frontendSection5Department
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendSection5Department $frontendSection5Department)
    {
        //
    }

    public function frontend_department_delete($id)
    {
        FrontendSection5Department::find($id)->delete();
        return redirect('frontend_department')->with('delete_success', ' ');

    }

    public function ChangeStatus($id)
    {
        $get_id = FrontendSection5Department::find($id);

        if ($get_id->status) {
            // just do status inactive
            $get_id->status = 0;
        } else {
            
            $get_id->status = 1;
        }
        $get_id->save();

        return back();
    }
}
