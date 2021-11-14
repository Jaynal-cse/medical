<?php

namespace App\Http\Controllers;

use App\FooterLogoItem;
use Illuminate\Http\Request;

class FooterLogoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FooterLogoItems = FooterLogoItem::all();
        return view('admin.footer.footerLogoItem.view',compact('FooterLogoItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.footer.footerLogoItem.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FooterLogoItem::insert([
            'paragraph' => $request->paragraph,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect('footer_logo_item')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterLogoItem  $footerLogoItem
     * @return \Illuminate\Http\Response
     */
    public function show(FooterLogoItem $footerLogoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterLogoItem  $footerLogoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterLogoItem $footerLogoItem)
    {
        return view('admin.footer.footerLogoItem.edit',compact('footerLogoItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterLogoItem  $footerLogoItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterLogoItem $footerLogoItem)
    {
        $request->all();
        $footerLogoItem->paragraph = $request->paragraph;
        $footerLogoItem->location = $request->location;
        $footerLogoItem->phone = $request->phone;
        $footerLogoItem->email = $request->email;
        $footerLogoItem->save();

        return redirect('footer_logo_item')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterLogoItem  $footerLogoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterLogoItem $footerLogoItem)
    {
        //
    }

    public function footer_logo_item_delete($id)
    {
        FooterLogoItem::find($id)->delete();
        return redirect('footer_logo_item')->with('delete_success',' ');

    }

    public function active($id){

        $footer_logo_item = FooterLogoItem::find($id);
        if ($footer_logo_item->status == 0) {
            FooterLogoItem::find($id)->update([
                'status' => 1,
            ]);
        }
        FooterLogoItem::where('id','!=',$id)->update([
            'status' => 0,
        ]);
        return Redirect()->back();
    }
}
