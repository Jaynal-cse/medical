<?php

namespace App\Http\Controllers;

use App\FooterBottomIcon;
use Illuminate\Http\Request;

class FooterBottomIconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerBottomIcons = FooterBottomIcon::all();
        return view('admin.footer.footerBottomIcon.view',compact('footerBottomIcons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.footerBottomIcon.create');
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
            'icon' => 'required',
            'link' => 'required',
        ]);
        FooterBottomIcon::insert([
            'icon' => $request->icon,
            'link' => $request->link,
            'status' => 0,
        ]);

        return redirect('footer_bottom_icon')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterBottomIcon  $footerBottomIcon
     * @return \Illuminate\Http\Response
     */
    public function show(FooterBottomIcon $footerBottomIcon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterBottomIcon  $footerBottomIcon
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterBottomIcon $footerBottomIcon)
    {
        return view('admin.footer.footerBottomIcon.edit',compact('footerBottomIcon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterBottomIcon  $footerBottomIcon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterBottomIcon $footerBottomIcon)
    {
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);

        $request->all();
        $footerBottomIcon->icon = $request->icon;
        $footerBottomIcon->link = $request->link;
        $footerBottomIcon->save();

        return redirect('footer_bottom_icon')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterBottomIcon  $footerBottomIcon
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterBottomIcon $footerBottomIcon)
    {
        //
    }

    public function footer_bottom_icon_delete($id)
    {
        FooterBottomIcon::find($id)->delete();
        return redirect('footer_bottom_icon')->with('delete_success',' ');
    }

    public function changeStatus($id)
    {
        $footer_bottom_icon = FooterBottomIcon::find($id);

        if ($footer_bottom_icon->status) {
            // just do status inactive
            $footer_bottom_icon->status = 0;
        } else {
            // first count active status
            $count = FooterBottomIcon::where('status', 1)->count();
            if ($count > 4) {
                    FooterBottomIcon::where('status', 1)->orderBy('updated_at')->first()->update([
                    'status' => 0
                ]);
            }
            $footer_bottom_icon->status = 1;
        }
        $footer_bottom_icon->save();

        return back();
    }
}
