<?php

namespace App\Http\Controllers;

use App\FrontendOurTeam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendOurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $our_team = FrontendOurTeam::orderBy('created_at','desc')->get();
        return view('admin.FrontendOurTeam.view',compact('our_team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FrontendOurTeam.create');
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
        FrontendOurTeam::insert([
            'heading'     => $request->heading,
            'sub_heading' => $request->sub_heading,
            'created_at'  => Carbon::now(),
        ]);
        
        return redirect('frontend_our_team')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendOurTeam  $frontendOurTeam
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendOurTeam $frontendOurTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendOurTeam  $frontendOurTeam
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendOurTeam $frontendOurTeam)
    {
        return view('admin.FrontendOurTeam.edit',compact('frontendOurTeam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendOurTeam  $frontendOurTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendOurTeam $frontendOurTeam)
    {
        $request->validate([
            'heading' => 'required',
        ]);

        $request->all();
        $frontendOurTeam->heading = $request->heading;
        $frontendOurTeam->sub_heading = $request->sub_heading;
        $frontendOurTeam->save();

        return redirect('frontend_our_team')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendOurTeam  $frontendOurTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendOurTeam $frontendOurTeam)
    {
        //
    }

    public function delete($id)
    {
        FrontendOurTeam::find($id)->delete();
        return redirect('frontend_our_team')->with('delete_success',' ');
    }

    public function ChangeStatus($id)
    {
       $our_team =  FrontendOurTeam::find($id);
       if($our_team->status == 0){
        FrontendOurTeam::find($id)->update([
            'status' => 1,
        ]);
       } 

        FrontendOurTeam::where('id', '!=', $id)->update([
            'status' => 0,
       ]);

       return back();
    }
}
