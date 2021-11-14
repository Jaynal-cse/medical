<?php

namespace App\Http\Controllers;

use App\Abouttitle;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class AbouttitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = Abouttitle::orderBy('created_at', 'desc')->get();
        return view('admin.about_title.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_title.add_about_title');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'about_title'=>'required',
        //     'about_sub_title'=>'required',
        //     'about_desp'=>'required',
        //     'about_signature' =>'file|mimes:jpg,jpeg,png|max:200',
        //     'about_image' =>'file|mimes:jpg,jpeg,png|max:400',
        // ]);

        $return_from_db = Abouttitle::create([
            'about_title'=>$request->about_title,
            'about_sub_title'=>$request->about_sub_title,
            'about_desp'=>$request->about_desp,
            'designation'=>$request->designation,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_photo = $request->file('about_image');
        $new_photo_name = $return_from_db->id.'.'.$uploaded_photo->extension();
        $new_photo_location = base_path('public/uploads/about_title/'.$new_photo_name);

        Image::make($uploaded_photo)->resize(456,620)->save($new_photo_location);

        Abouttitle::find($return_from_db->id)->update([
            'about_image'=>$new_photo_name,   
        ]);
            
        return redirect('abouttitle')->with('success','About Title Added Successfully ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Abouttitle  $abouttitle
     * @return \Illuminate\Http\Response
     */
    public function show(Abouttitle $abouttitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Abouttitle  $abouttitle
     * @return \Illuminate\Http\Response
     */
    public function edit(Abouttitle $abouttitle)
    {
        return view('admin.about_title.edit_about_title', compact('abouttitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Abouttitle  $abouttitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abouttitle $abouttitle)
    {
        $request->all();

        if($request->hasFile('about_image')){
            if($abouttitle->about_image != 'about_default.jpg'){
                $delete_location = base_path('public/uploads/about_title/'.$abouttitle->about_image);
                unlink($delete_location);
            }

            $uploaded_photo = $request->file('about_image');
            $new_photo_name = $abouttitle->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/about_title/'.$new_photo_name);//for uploads fldr

            Image::make($uploaded_photo)->resize(456,620)->save($new_photo_location);
            $abouttitle->about_image = $new_photo_name;//for db
        }
        
        $abouttitle->about_title = $request->about_title;
        $abouttitle->about_sub_title = $request->about_sub_title;
        $abouttitle->about_desp = $request->about_desp;
        $abouttitle->designation = $request->designation;
        $abouttitle->save();
        return redirect('abouttitle')->with('update','About Title Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Abouttitle  $abouttitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Abouttitle $abouttitle)
    {
        //
    }

    public function view_about_title($about_id)
    {
        $view = Abouttitle::find($about_id);
        return view('admin.about_title.about_title_view', compact('view'));
    }

    public function aboutsActive($about_id)
    {
        $logo = Abouttitle::find($about_id);
        if ($logo->status == 0) {
            Abouttitle::find($about_id)->update([
                'status' => 1,
            ]);
        }
        Abouttitle::where('id', '!=', $about_id)->update([
            'status' => 0,
        ]);
        return back()->with('status', 'About Title Status Changed Successfully!');
    }


    public function delete_about_title($about_id){
      $del = Abouttitle::find($about_id);
      if($del->about_image != 'about_default.jpg'){
            $location = base_path('public/uploads/about_title/').$del->about_image;
            unlink($location);
        }
    $del->delete();
    return back()->with('delete', 'One About Title Deleted Successfully!');
    }




}
