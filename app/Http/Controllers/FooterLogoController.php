<?php

namespace App\Http\Controllers;

use App\FooterLogo;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class FooterLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FooterLogos = FooterLogo::all();
        return view('admin.footer.footerLogo.view',compact('FooterLogos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.footerLogo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $return_form_db = FooterLogo::create([
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_footer_logo = $request->file('logo');
        $new_footer_logo_name = $return_form_db->id.'.'.$uploaded_footer_logo->extension();
        $new_footer_logo_location = base_path('public/uploads/footer_logo/'.$new_footer_logo_name);
        Image::make($uploaded_footer_logo)->save($new_footer_logo_location);
        FooterLogo::find($return_form_db->id)->update([
            'logo'=>$new_footer_logo_name,
        ]);

        return redirect('footer_logo')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterLogo  $footerLogo
     * @return \Illuminate\Http\Response
     */
    public function show(FooterLogo $footerLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterLogo  $footerLogo
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterLogo $footerLogo)
    {
        return view('admin.footer.footerLogo.edit',compact('footerLogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterLogo  $footerLogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterLogo $footerLogo)
    {
        $request->all();
        if($request->hasFile('logo')) {
            if ($footerLogo->logo != 'patient_default_photo.jpg') {
                $delete_location = base_path('public/uploads/footer_logo/' . $footerLogo->logo);
                unlink($delete_location);
            }

            $uploaded_footer_logo = $request->file('logo');
            $new_footer_logo_name = $footerLogo->id . '.' . $uploaded_footer_logo->extension();
            $new_footer_logo_location = base_path('public/uploads/footer_logo/' . $new_footer_logo_name);
            Image::make($uploaded_footer_logo)->save($new_footer_logo_location);

            $footerLogo->logo =  $new_footer_logo_name;
        }

        return redirect('footer_logo')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterLogo  $footerLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLogo $footerLogo)
    {
        //
    }

    public function footer_logo_delete($id)
    {
        FooterLogo::find($id)->delete();
        return redirect('footer_logo')->with('delete_success',' ');
    }

    public function active($id){

        $footer_logo = FooterLogo::find($id);
        if ($footer_logo->status == 0) {
            FooterLogo::find($id)->update([
                'status' => 1,
            ]);
        }
        FooterLogo::where('id','!=',$id)->update([
            'status' => 0,
        ]);
        return Redirect()->back();
    }
}
