<?php

namespace App\Http\Controllers;

use App\FooterUperPart;
use Image;
use Illuminate\Http\Request;

class FooterUperPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FooterUpperParts = FooterUperPart::all();
        return view('admin.footerUpperPart.view',compact('FooterUpperParts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footerUpperPart.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $return_form_db = FooterUperPart::create([
            'paragraph' => $request->paragraph,
            'icon' => $request->icon,
            'phone' => $request->phone,
            'button_color' => $request->button_color,
            'button_text' => $request->button_text,
            'button_link' => $request->button_link,
        ]);

        $uploaded_photo = $request->file('image');
        $new_photo_name = $return_form_db->id.'.'.$uploaded_photo->extension();
        $new_photo_location = base_path('public/uploads/footer_upper_part/'.$new_photo_name);
        Image::make($uploaded_photo)->resize(300,300)->save($new_photo_location);
        FooterUperPart::find($return_form_db->id)->update([
            'image'=>$new_photo_name,
        ]);

        return redirect('footer_upper_part')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterUperPart  $footerUperPart
     * @return \Illuminate\Http\Response
     */
    public function show(FooterUperPart $footerUperPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterUperPart  $footerUperPart
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterUperPart $footerUperPart)
    {
        //
    }

    public function footer_upper_part_edit($id)
    {
        $FooterUpperParts = FooterUperPart::find($id);
        return view('admin.footerUpperPart.edit', compact('FooterUpperParts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterUperPart  $footerUperPart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterUperPart $footerUperPart)
    {
        //
    }

    public function footer_upper_part_update(Request $request)
    {
        $get_id = FooterUperPart::where('id', $request->id)->first();

        $request->all();
        if($request->hasFile('image')) {
            if ($get_id->image != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/footer_upper_part/' . $get_id->image);
                unlink($delete_location);
            }
            
            $uploaded_photo = $request->file('image');
            $new_photo_name = $get_id->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/footer_upper_part/'.$new_photo_name);
            Image::make($uploaded_photo)->save($new_photo_location);

            $get_id->image = $new_photo_name;
        }

        $get_id->paragraph = $request->paragraph;
        $get_id->icon = $request->icon;
        $get_id->phone = $request->phone;
        $get_id->button_color = $request->button_color;
        $get_id->button_text = $request->button_text;
        $get_id->button_link = $request->button_link;

        $get_id->save();

        return redirect('footer_upper_part')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterUperPart  $footerUperPart
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterUperPart $footerUperPart)
    {
        //
    }
}
