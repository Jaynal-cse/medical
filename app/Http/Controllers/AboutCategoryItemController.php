<?php

namespace App\Http\Controllers;

use App\AboutBulletPoint;
use App\AboutCategoryItem;
use App\FrontendAboutCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AboutCategoryItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_items = AboutCategoryItem::with('get_bullet_points')->get();
        return view('admin.about.about_category_item.view',compact('category_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = FrontendAboutCategory::all();
        return view('admin.about.about_category_item.create',compact('category'));
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
            'about_category_id' => 'required',
            'title'             => 'required',
            'paragraph'         => 'required',
        ]);
        $category_item = AboutCategoryItem::create([
            'about_category_id' => $request->about_category_id,
            'title'             => $request->title,
            'paragraph'         => $request->paragraph,
        ]);

        foreach($request->bullet_point as $key=> $bullet)
        {
            $category_item->get_bullet_points()->create([
                'bullet_point' => $bullet,
            ]);
        }

        if ($request->hasFile('image')) 
        {
            $uploaded_photo      = $request->file('image');
            $new_photo_name      = $category_item->id.'.'.$uploaded_photo->extension();
            $new_photo_location  = base_path('public/uploads/about_media/'.$new_photo_name);

            Image::make($uploaded_photo)->save($new_photo_location);

            $category_item->update([
                'image'=>$new_photo_name,
            ]);
        }
        
        $data = new AboutCategoryItem;
        if($request->file('multimedia'))
        {
            $file = $request->file('multimedia');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->multimedia->move('uploads/about_media/',$filename);
            $data->multimedia=$filename;
        }

        // $data = new PatientDocumnet;
        // if($request->file('patient_document'))
        //{
        //     $file = $request->file('patient_document');
        //     $filename = time().'.'.$file->getClientOriginalExtension();
        //     $request->patient_document->move('uploads/patient_document/',$filename);
        //     $data->patient_document=$filename;
        // }

        return redirect('about_category_item')->with('added_success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutCategoryItem  $aboutCategoryItem
     * @return \Illuminate\Http\Response
     */
    public function show(AboutCategoryItem $aboutCategoryItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutCategoryItem  $aboutCategoryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutCategoryItem $aboutCategoryItem)
    {
        $category = FrontendAboutCategory::all();
        return view('admin.about.about_category_item.edit',compact('aboutCategoryItem','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutCategoryItem  $aboutCategoryItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutCategoryItem $aboutCategoryItem)
    {
        // dd($request->all());
        if($request->hasFile('image')) {
            if ($aboutCategoryItem->image != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/about_media/' . $aboutCategoryItem->image);
                unlink($delete_location);
            }
            
            $uploaded_photo      = $request->file('image');
            $new_photo_name      = $aboutCategoryItem->id.'.'.$uploaded_photo->extension();
            $new_photo_location  = base_path('public/uploads/about_media/'.$new_photo_name);

            Image::make($uploaded_photo)->save($new_photo_location);

            $aboutCategoryItem->image = $new_photo_name;
        }

        if($request->hasFile('multimedia')) {
            if ($aboutCategoryItem->multimedia != 'default_photo.jpg') {
                $delete_location = base_path('public/uploads/about_media/' . $aboutCategoryItem->multimedia);
                unlink($delete_location);
            }
            
            $file = $request->file('multimedia');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $request->multimedia->move('uploads/about_media/',$filename);
            $aboutCategoryItem->multimedia=$filename;

        }

        $aboutCategoryItem->about_category_id = $request->about_category_id;
        $aboutCategoryItem->title = $request->title;
        $aboutCategoryItem->paragraph = $request->paragraph;


        $aboutCategoryItem->save();

        $current_bullet_point_ids = array_filter($request->old_ids);
        AboutBulletPoint::where('about_category_item_id', $aboutCategoryItem->id)->whereNotIn('id', ($current_bullet_point_ids ?? []))->delete();
        
        foreach($request->bullet_point as $key => $bullet)
        {
            if ($request->old_ids[$key] != null) {
                AboutBulletPoint::where('id', $request->old_ids[$key])->update([
                    'bullet_point' => $bullet
                ]);
            } else {
                $aboutCategoryItem->get_bullet_points()->create([
                    'bullet_point' => $bullet,
                ]);
            }
        }

        return redirect('about_category_item')->with('edit_success', ' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutCategoryItem  $aboutCategoryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutCategoryItem $aboutCategoryItem)
    {
        //
    }

    public function category_item_delete($id)
    {
        AboutCategoryItem::find($id)->delete();
        return redirect('about_category_item')->with('delete_success', ' ');
    }
}
