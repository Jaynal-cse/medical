<?php

namespace App\Http\Controllers;

use App\FrontendTrippleLogo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendTrippleLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = FrontendTrippleLogo::orderBy('created_at','desc')->get();
        return view('admin.frontendTrippleLogo.index',compact('logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontendTrippleLogo.create');
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
            'heading' => 'required',
        ]);
        $return_from_db = FrontendTrippleLogo::create([
            'heading' => $request->heading,
            'created_at' => Carbon::now(),
        ]);

        if($request->file('logo1')){
            $file = $request->file('logo1');
            $filename1 = time().'1'.'.'.$file->getClientOriginalExtension();
            $request->logo1->move('uploads/frontend_tripple_logo/',$filename1);
            $return_from_db->logo1 = $filename1;
        }

        if($request->file('logo2')){
            $file = $request->file('logo2');
            $filename2 = time().'2'.'.'.$file->getClientOriginalExtension();
            $request->logo2->move('uploads/frontend_tripple_logo/',$filename2);
            $return_from_db->logo2 = $filename2;
        }

        if($request->file('logo3')){
            $file = $request->file('logo3');
            $filename3 = time().'3'.'.'.$file->getClientOriginalExtension();
            $request->logo3->move('uploads/frontend_tripple_logo/',$filename3);
            $return_from_db->logo3 = $filename3;
        }
        $return_from_db->save();
        return redirect('frontend_tripple_logo')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendTrippleLogo  $frontendTrippleLogo
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendTrippleLogo $frontendTrippleLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendTrippleLogo  $frontendTrippleLogo
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendTrippleLogo $frontendTrippleLogo)
    {
        return view('admin.frontendTrippleLogo.edit',compact('frontendTrippleLogo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendTrippleLogo  $frontendTrippleLogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendTrippleLogo $frontendTrippleLogo)
    {
        $request->all();
        if($request->hasFile('logo1')){
            $delete_location = base_path('public/uploads/frontend_tripple_logo/'.$frontendTrippleLogo->logo1);
            unlink($delete_location);

            $file = $request->file('logo1');
            $filename1 = time().'1'.'.'.$file->getClientOriginalExtension();
            $request->logo1->move('uploads/frontend_tripple_logo/',$filename1);
            $frontendTrippleLogo->logo1 = $filename1;
            }

        if($request->hasFile('logo2')){
            $delete_location = base_path('public/uploads/frontend_tripple_logo/'.$frontendTrippleLogo->logo2);
            unlink($delete_location);

            $file = $request->file('logo2');
            $filename2 = time().'2'.'.'.$file->getClientOriginalExtension();
            $request->logo2->move('uploads/frontend_tripple_logo/',$filename2);
            $frontendTrippleLogo->logo2 = $filename2;
        }

        if($request->hasFile('logo3')){
            $delete_location = base_path('public/uploads/frontend_tripple_logo/'.$frontendTrippleLogo->logo3);
            unlink($delete_location);

            $file = $request->file('logo3');
            $filename3 = time().'3'.'.'.$file->getClientOriginalExtension();
            $request->logo3->move('uploads/frontend_tripple_logo/',$filename3);
            $frontendTrippleLogo->logo3 = $filename3;
        }

        $frontendTrippleLogo->heading = $request->heading;
        $frontendTrippleLogo->save();

        return redirect('frontend_tripple_logo')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendTrippleLogo  $frontendTrippleLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendTrippleLogo $frontendTrippleLogo)
    {
        //
    }

    public function delete($id)
    {  
        FrontendTrippleLogo::find($id)->delete();
        return redirect('frontend_tripple_logo')->with('delete_success',' ');
        
    }

    public function ChangeStatus($id)
    {
        $changestatus = FrontendTrippleLogo::find($id);
        if($changestatus->status == 0)
        {
            FrontendTrippleLogo::find($id)->update([
                'status' => 1,
            ]);
        }
        else
        {
            FrontendTrippleLogo::find($id)->update([
                'status' => 0,
            ]);
        }

        FrontendTrippleLogo::Where('id', '!=', $id)->update([
            'status' => 0,
        ]);

        return back();

    }
}
