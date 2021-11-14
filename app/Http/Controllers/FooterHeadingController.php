<?php

namespace App\Http\Controllers;

use App\FooterHeading;
use Illuminate\Http\Request;

class FooterHeadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerHeadings = FooterHeading::all();
        return view('admin.footer.footerHeading.view',compact('footerHeadings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.footerHeading.create');
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
            'heading'=>'required|unique:footer_headings',
        ]);
        FooterHeading::insert([
            'heading'=>$request->heading,
            'status'=> 1,
        ]);

        return redirect('footer_heading')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterHeading  $footerHeading
     * @return \Illuminate\Http\Response
     */
    public function show(FooterHeading $footerHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterHeading  $footerHeading
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterHeading $footerHeading)
    {
        return view('admin.footer.footerHeading.edit',compact('footerHeading'));
    }

    public function changeStatus($id)
    {
        $footerHeading = FooterHeading::find($id);

        if ($footerHeading->status) {
            // just do status inactive
            $footerHeading->status = 0;
        } else {
            // first count active status
            $count = FooterHeading::where('status', 1)->count();
            if ($count > 1) {
//                FooterHeading::active()->first()->update([
                    FooterHeading::where('status', 1)->orderBy('updated_at')->first()->update([
                    'status' => 0
                ]);
            }
            $footerHeading->status = 1;
        }
        $footerHeading->save();

        return redirect('footer_heading')->with('added_success', ' ');
//        return $footerHeading;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterHeading  $footerHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterHeading $footerHeading)
    {
        $request->validate([
            'heading'=>'required',
        ]);

        $request->all();
        $footerHeading->heading = $request->heading;
        $footerHeading->save();
        return redirect('footer_heading')->with('edit_success',' ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterHeading  $footerHeading
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterHeading $footerHeading)
    {
        //
    }

    public function footer_heading_delete($id)
    {
        FooterHeading::find($id)->delete();
        return redirect('footer_heading')->with('delete_success',' ');
    }
}
