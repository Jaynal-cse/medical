<?php

namespace App\Http\Controllers;

use App\Icon;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::orderBy('created_at', 'desc')->get();
        return view('admin.icon.index', compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.icon.add_icon');
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
            'frontend_title'=>'required',
            'dashboard_title'=>'required',
            'icon' => 'file|mimes:jpg,jpeg,png|max:200',
        ]);

        $return_from_db = Icon::create([
            'frontend_title'=>$request->frontend_title,
            'dashboard_title'=>$request->dashboard_title,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_photo = $request->file('icon');
        $new_photo_name = $return_from_db->id.'.'.$uploaded_photo->extension();
        $new_photo_location = base_path('public/uploads/icon/'.$new_photo_name);

        Image::make($uploaded_photo)->resize(50,50)->save($new_photo_location);

        Icon::find($return_from_db->id)->update([
            'icon'=>$new_photo_name,   
        ]);
            


        return redirect('icon')->with('success','Icon & Title Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function show(Icon $icon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function edit(Icon $icon)
    {
        return view('admin.icon.edit_icon', compact('icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Icon $icon)
    {
        $request->all();

        if($request->hasFile('icon')){
            if($icon->icon != 'icon_default.jpg'){
                $delete_location = base_path('public/uploads/icon/'.$icon->icon);
                unlink($delete_location);
            }

            $uploaded_photo = $request->file('icon');
            $new_photo_name = $icon->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/icon/'.$new_photo_name);//for uploads fldr

            Image::make($uploaded_photo)->resize(50,50)->save($new_photo_location);
            $icon->icon = $new_photo_name;//for db
        }
        
        $icon->frontend_title = $request->frontend_title;
        $icon->dashboard_title = $request->dashboard_title;
        $icon->save();
        return redirect('icon')->with('update','Icon & Title Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Icon  $icon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icon $icon)
    {
        //
    }

    public function view_icon($icon_id)
    {
        $view = Icon::find($icon_id);
        return view('admin.icon.view_icon', compact('view'));
    }

    public function iconActive($icon_id)
    {
        $icon = Icon::find($icon_id);
        if ($icon->status == 0) {
            Icon::find($icon_id)->update([
                'status' => 1,
            ]);
        }
        Icon::where('id', '!=', $icon_id)->update([
            'status' => 0,
        ]);
        return back()->with('status', 'Frontend Icon & Title Status Changed Successfully!');
    }

    public function delete_icon($icon_id){
      $del = Icon::find($icon_id);
      if($del->icon != 'icon_default.jpg'){
            $location = base_path('public/uploads/icon/').$del->icon;
            unlink($location);
        }
    $del->delete();
    return back()->with('delete', 'One Icon & Title Deleted Successfully!');
    }





    public function font_awesome_index()
    {
        return view('admin.icons.FontAwsome.index');
    }

    public function themify_index()
    {
        return view('admin.icons.Themify.index');
    }



}
