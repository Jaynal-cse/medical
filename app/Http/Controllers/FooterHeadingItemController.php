<?php

namespace App\Http\Controllers;

use App\FooterHeadingItem;
use App\FooterHeading;
use Illuminate\Http\Request;

class FooterHeadingItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FooterHeadingItems = FooterHeadingItem::all();
        return view('admin.footer.footerHeadingItem.view',compact('FooterHeadingItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $FooterHeadings = FooterHeading::all();
        return view('admin.footer.footerHeadingItem.create',compact('FooterHeadings'));
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
            'heading_id'=>'required',
            'heading_item' => 'required|unique:footer_heading_items',
        ]);

        FooterHeadingItem::insert([
            'heading_id'=>$request->heading_id,
            'heading_item' => $request->heading_item,
            'link' => $request->link,
            'status' => 0,
        ]);

        return redirect('footer_heading_item')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FooterHeadingItem  $footerHeadingItem
     * @return \Illuminate\Http\Response
     */
    public function show(FooterHeadingItem $footerHeadingItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FooterHeadingItem  $footerHeadingItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterHeadingItem $footerHeadingItem)
    {
        $FooterHeadings = FooterHeading::all();
        return view('admin.footer.footerHeadingItem.edit',compact('footerHeadingItem','FooterHeadings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FooterHeadingItem  $footerHeadingItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterHeadingItem $footerHeadingItem)
    {
        $request->validate([
            'heading_id'=>'required',
            'heading_item' => 'required',
        ]);

        $request->all();
        $footerHeadingItem->heading_id = $request->heading_id;
        $footerHeadingItem->heading_item = $request->heading_item;
        $footerHeadingItem->link = $request->link;
        $footerHeadingItem->save();

        return redirect('footer_heading_item')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FooterHeadingItem  $footerHeadingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterHeadingItem $footerHeadingItem)
    {
        //
    }

    public function footer_heading_item_delete($id)
    {
        FooterHeadingItem::find($id)->delete();
        return redirect('footer_heading_item')->with('delete_success',' ');
    }

    public function active($id){
        FooterHeadingItem::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function inactive($id){
        FooterHeadingItem::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
