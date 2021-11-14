<?php

namespace App\Http\Controllers;

use App\FrontendHeaderLogo;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class FrontendHeaderLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header_logo = FrontendHeaderLogo::all();
        return view('admin.frontendHeaderLogo.view',compact('header_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontendHeaderLogo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $return_form_db  = FrontendHeaderLogo::create([
            'link'       => $request->link,
            'created_at' => Carbon::now(),
        ]);
        
        if($request->hasFile('logo'))
        {
            
        $uploaded_logo = $request->file('logo');
        $new_logo_name = $return_form_db->id.'.'.$uploaded_logo->extension();
        $new_logo_location = base_path('public/uploads/header_logo/'.$new_logo_name);
        Image::make($uploaded_logo)->save($new_logo_location);
        FrontendHeaderLogo::find($return_form_db->id)->update([
            'logo'=>$new_logo_name,
        ]);
        
        }

        return redirect('header-logo')->with('added_success', ' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendHeaderLogo  $frontendHeaderLogo
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendHeaderLogo $frontendHeaderLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendHeaderLogo  $frontendHeaderLogo
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendHeaderLogo $headerLogo)
    {
        return view('admin.frontendHeaderLogo.edit',compact('headerLogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendHeaderLogo  $frontendHeaderLogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendHeaderLogo $headerLogo)
    {
        $request->all();
        if($request->hasFile('logo')) {
            if ($headerLogo->logo != 'default_logo.jpg') {
                $delete_location = base_path('public/uploads/header_logo/' . $headerLogo->logo);
                unlink($delete_location);
            }

        $uploaded_logo = $request->file('logo');
        $new_logo_name = $headerLogo->id.'.'.$uploaded_logo->extension();
        $new_logo_location = base_path('public/uploads/header_logo/'.$new_logo_name);
        Image::make($uploaded_logo)->save($new_logo_location);

            $headerLogo->logo =  $new_logo_name;
        }

        $headerLogo->link = $request->link;
        $headerLogo->save();

        return redirect('header-logo')->with('edit_success', ' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendHeaderLogo  $frontendHeaderLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendHeaderLogo $frontendHeaderLogo)
    {
        //
    }

    public function delete($id)
    {
        FrontendHeaderLogo::find($id)->delete();
        return redirect('header-logo')->with('delete_success', ' ');
    }

    public function ChangeStatus($id)
    {
        $get_id = FrontendHeaderLogo::find($id);

        if($get_id->status == 0)
        {
            FrontendHeaderLogo::find($id)->update([
                'status' => 1,
            ]);

        }
        else
        {
            FrontendHeaderLogo::find($id)->update([
                'status' => 0,
            ]);
        }

        FrontendHeaderLogo::where('id', '!=', $id)->update([
            'status' => 0,
        ]);

        return back();
    }
}
