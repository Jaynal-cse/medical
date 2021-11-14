<?php

namespace App\Http\Controllers;

use App\Banner;
use Image;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontend_banners = Banner::all();
        return view('admin.frontend_banner.view',compact('frontend_banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontend_banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner = Banner::create([
            'heading'       => $request->heading,
            'paragraph'     => $request->paragraph,
            'button_color'  => $request->button_color,
            'button_text'   => $request->button_text,
            'status'        => 1
        ]);

        if ($request->hasFile('image')) {

            $uploaded_banner_photo      = $request->file('image');
            $new_banner_photo_name      = $banner->id.'.'.$uploaded_banner_photo->extension();
            $new_banner_photo_location  = base_path('public/uploads/banner_photo/'.$new_banner_photo_name);

            Image::make($uploaded_banner_photo)->save($new_banner_photo_location);

            $banner->update([
                'image'=>$new_banner_photo_name,
            ]);
        }

        return redirect('frontend_banner')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.frontend_banner.edit',compact('banner'));
    }

    public function banner_edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.frontend_banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    public function banner_update(Request $request)
    {
        $get_id = Banner::where('id',$request->id)->first();

        $request->all();
        if($request->hasFile('image')) {
            if ($get_id->image != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/banner_photo/' . $get_id->image);
                unlink($delete_location);
            }

            $uploaded_banner_photo = $request->file('image');
            $new_banner_photo_name = $get_id->id . '.' . $uploaded_banner_photo->extension();
            $new_banner_photo_location = base_path('public/uploads/banner_photo/' . $new_banner_photo_name);
            Image::make($uploaded_banner_photo)->save($new_banner_photo_location);
            $get_id->image = $new_banner_photo_name;
        }

        $get_id->heading = $request ->heading;
        $get_id->paragraph = $request ->paragraph;
        $get_id->button_color = $request ->button_color;
        $get_id->button_text = $request ->button_text;
        $get_id->save();

        return redirect('frontend_banner')->with('edit_success',' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }

    public function banner_delete($id)
    {
        Banner::find($id)->delete();
        return redirect('frontend_banner')->with('delete_success',' ');
    }

    public function active($id){
        Banner::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function inactive($id){
        Banner::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
