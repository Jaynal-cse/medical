<?php

namespace App\Http\Controllers;

use App\FrontendAboutCategory;
use App\AboutCategoryItem;
use Illuminate\Http\Request;

class FrontendAboutCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_categories = FrontendAboutCategory::all();
        return view('admin.about.about_category.view',compact('about_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.about_category.create');
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
            'about_category' => 'required',
            'link'           => 'required',
        ]);
        FrontendAboutCategory::insert([
            'about_category' => $request->about_category,
            'link'           => $request->link,
        ]);

        return redirect('about_category')->with('added_success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendAboutCategory  $frontendAboutCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendAboutCategory $frontendAboutCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendAboutCategory  $frontendAboutCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendAboutCategory $frontendAboutCategory)
    {
        //
    }

    public function about_category_edit($id)
    {
        $about_category = FrontendAboutCategory::find($id);
        return view('admin.about.about_category.edit',compact('about_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendAboutCategory  $frontendAboutCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendAboutCategory $frontendAboutCategory)
    {
        //
    }

    public function about_category_update(Request $request)
    {
        $request->validate([
            'about_category' => 'required',
            'link'           => 'required',
        ]);

        $request->all();
        $get_id = FrontendAboutCategory::where('id', $request->id)->first();
        
        $get_id->about_category = $request->about_category;
        $get_id->link = $request->link;
        $get_id->save();

        return redirect('about_category')->with('edit_success', ' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendAboutCategory  $frontendAboutCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendAboutCategory $frontendAboutCategory)
    {
        //
    }

    public function about_category_delete($id)
    {
        FrontendAboutCategory::find($id)->delete();
        return redirect('about_category')->with('delete_success', ' ');
    }

    public function ChangeStatus($id)
    {
        $get_id = FrontendAboutCategory::find($id);

        if($get_id->status == 0){
            FrontendAboutCategory::find($id)->update([
                'status' => 1,
            ]);
        }
        else{
            $get_id->status = 0;
        }
        $get_id->save();

        return back();
    }

    
}
