<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutOfeer;
use Carbon\Carbon;
use Image;

class AboutOfferController extends Controller
{
    public function index()
    {
        $aboutOffers = AboutOfeer::all();
        return view('admin.about.aboutOffer.view',compact('aboutOffers'));
    }

    public function create()
    {
        return view('admin.about.aboutOffer.create');
    }

    public function store(Request $request)
    {
        $get_id = AboutOfeer::create([
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_photo = $request->file('image');
        $new_photo_name = $get_id->id.'.'.$uploaded_photo->extension();
        $new_photo_location = base_path('public/uploads/about_offer/'.$new_photo_name);
        Image::make($uploaded_photo)->save($new_photo_location);
        AboutOfeer::find($get_id->id)->update([
            'image'=>$new_photo_name,
        ]);

        return redirect('about/offer')->with('added_succes',' ');
    }

    public function edit($id)
    {
       $get_id = AboutOfeer::find($id);
       return view('admin.about.aboutOffer.edit',compact('get_id'));
    }

    public function update(Request $request)
    {
        $get_id = AboutOfeer::where('id', $request->id)->first();

        $request->all();
        if($request->hasFile('image')) {
            if ($get_id->image != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/about_offer/' . $get_id->image);
                unlink($delete_location);
            }

         $uploaded_photo = $request->file('image');
         $new_photo_name = $get_id->id.'.'.$uploaded_photo->extension();
         $new_photo_location = base_path('public/uploads/about_offer/'.$new_photo_name);
         Image::make($uploaded_photo)->save($new_photo_location);
        
         $get_id->image = $new_photo_name;
        }

        $get_id->save();

        return redirect('about/offer')->with('edit_success',' ');
        
    }

    public function delete($id)
    {
        AboutOfeer::find($id)->delete();
        return redirect('about/offer')->with('delete_success',' ');
        
    }

    public function ChangeStatus($id)
    {
        $get_id = AboutOfeer::find($id);

        if($get_id->status == 0)
        {
            AboutOfeer::find($id)->update([
                'status' => 1,
            ]);

        }
        else
        {
            AboutOfeer::find($id)->update([
                'status' => 0,
            ]);
        }

        AboutOfeer::where('id', '!=', $id)->update([
            'status' => 0,
        ]);

        return back();
    }
}
