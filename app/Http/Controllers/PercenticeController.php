<?php

namespace App\Http\Controllers;

use App\Percentice;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class PercenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percents = Percentice::orderBy('created_at', 'desc')->get();
        return view ('admin.progress.index', compact('percents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.progress.add_percentice');
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
            'title'=>'required',
            'description'=>'required',
            'progress_name_one'=>'required',
            'progress_name_two'=>'required',
            'progress_name_three'=>'required',
            'percent_one'=>'required',
            'percent_two'=>'required',
            'percent_three'=>'required',
            'image' => 'file|mimes:jpg,jpeg,png|max:600',
        ]);

        $return_from_db = Percentice::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'progress_name_one'=>$request->progress_name_one,
            'progress_name_two'=>$request->progress_name_two,
            'progress_name_three'=>$request->progress_name_three,
            'progress_name_four'=>$request->progress_name_four,
            'percent_one'=>$request->percent_one,
            'percent_two'=>$request->percent_two,
            'percent_three'=>$request->percent_three,
            'percent_four'=>$request->percent_four,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_photo = $request->file('image');
        $new_photo_name = $return_from_db->id.'.'.$uploaded_photo->extension();
        $new_photo_location = base_path('public/uploads/progress/'.$new_photo_name);

        Image::make($uploaded_photo)->resize(960,800)->save($new_photo_location);

        Percentice::find($return_from_db->id)->update([
            'image'=>$new_photo_name,   
        ]);
            


        return redirect('percentice')->with('success','Progress Bar Information Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Percentice  $percentice
     * @return \Illuminate\Http\Response
     */
    public function show(Percentice $percentice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Percentice  $percentice
     * @return \Illuminate\Http\Response
     */
    public function edit(Percentice $percentice)
    {
        return view ('admin.progress.edit_percentice', compact('percentice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Percentice  $percentice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Percentice $percentice)
    {
        $request->all();

        if($request->hasFile('image')){
            if($percentice->about_image != 'default_image.jpg'){
                $delete_location = base_path('public/uploads/progress/'.$percentice->image);
                unlink($delete_location);
            }

            $uploaded_photo = $request->file('image');
            $new_photo_name = $percentice->id.'.'.$uploaded_photo->extension();
            $new_photo_location = base_path('public/uploads/progress/'.$new_photo_name);//for uploads fldr

            Image::make($uploaded_photo)->resize(960,800)->save($new_photo_location);
            $percentice->image = $new_photo_name;//for db
        }
        
        $percentice->title = $request->title;
        $percentice->description = $request->description;
        $percentice->progress_name_one = $request->progress_name_one;
        $percentice->progress_name_two = $request->progress_name_two;
        $percentice->progress_name_three = $request->progress_name_three;
        $percentice->progress_name_four = $request->progress_name_four;
        $percentice->percent_one = $request->percent_one;
        $percentice->percent_two = $request->percent_two;
        $percentice->percent_three = $request->percent_three;
        $percentice->percent_four = $request->percent_four;
        $percentice->save();
        return redirect('percentice')->with('update','Progress Bar Information Updated Successfully ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Percentice  $percentice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Percentice $percentice)
    {
        //
    }

    public function view_progress_bar($percentice_id)
    {
        $view = Percentice::find($percentice_id);
        return view('admin.progress.view_percentice', compact('view'));
    }


    public function progressActive($percentice_id)
    {
        $logo = Percentice::find($percentice_id);
        if ($logo->status == 0) {
            Percentice::find($percentice_id)->update([
                'status' => 1,
            ]);
        }
        Percentice::where('id', '!=', $percentice_id)->update([
            'status' => 0,
        ]);
        return back()->with('status', 'Progress Bar Status Changed Successfully!');
    }

    public function delete_progress_bar($percentice_id){
      $del = Percentice::find($percentice_id);
      if($del->image != 'default_image.jpg'){
            $location = base_path('public/uploads/progress/').$del->image;
            unlink($location);
        }
    $del->delete();
    return back()->with('delete', 'One Progress Bar Information Deleted Successfully!');
    }

}
