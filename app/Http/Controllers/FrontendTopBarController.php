<?php

namespace App\Http\Controllers;

use App\FrontendTopBar;
use Illuminate\Http\Request;

class FrontendTopBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontendTopBars = FrontendTopBar::all();
        return view('admin.frontendTopBar.view', compact('frontendTopBars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.frontendTopBar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FrontendTopBar::insert([
            'icon' => $request->icon,
            'item' => $request->item,
        ]);

        return redirect('frontend_top_bar')->with('added_success',' ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendTopBar  $frontendTopBar
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendTopBar $frontendTopBar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendTopBar  $frontendTopBar
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendTopBar $frontendTopBar)
    {
        return view('admin.frontendTopBar.edit',compact('frontendTopBar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendTopBar  $frontendTopBar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendTopBar $frontendTopBar)
    {
        $request->all();
        $frontendTopBar->icon = $request->icon;
        $frontendTopBar->item = $request->item;
        $frontendTopBar->save();

        return redirect('frontend_top_bar')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendTopBar  $frontendTopBar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendTopBar $frontendTopBar)
    {
        //
    }

    public function frontend_top_bar_delete($id)
    {
        FrontendTopBar::find($id)->delete();
        return redirect('frontend_top_bar')->with('delete_success',' ');
    }

    public function ChangeStatus($id)
    {
        $get_id = FrontendTopBar::find($id);

        if($get_id->status == 1)
        {
            FrontendTopBar::find($id)->update([
                'status' => 0,
            ]);
        }
        else
        {
            $count = FrontendTopBar::where('status', 1)->count();
            if($count > 2) 
            {
                FrontendTopBar::where('status', 1)->orderBy('updated_at')->first()->update([
                    'status' => 0,
                ]);
            }

            $get_id->status = 1;
        }

        $get_id->save();

        return back();
    }

}

