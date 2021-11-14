<?php

namespace App\Http\Controllers;

use App\NoticeBoard;
use Illuminate\Http\Request;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeboards=NoticeBoard::all();
        return view('admin.notice_board.all_notice',compact('noticeboards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice_board.add_notice');
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
            'title'=>'required',
            'description'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
        ]);

        NoticeBoard::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
        ]);

        return redirect('notice_board')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeBoard $noticeBoard)
    {
        return view('admin.notice_board.view_notice',compact('noticeBoard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function edit(NoticeBoard $noticeBoard)
    {
        return view('admin.notice_board.edit_notice',compact('noticeBoard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NoticeBoard $noticeBoard)
    {
        $request->all();
        $noticeBoard->title = $request->title;
        $noticeBoard->description = $request->description;
        $noticeBoard->start_date = $request->start_date;
        $noticeBoard->end_date = $request->end_date;
        $noticeBoard->status = $request->status;
        $noticeBoard->save();

        return redirect('notice_board')->with('edit_success',' ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NoticeBoard  $noticeBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoticeBoard $noticeBoard)
    {
        //
    }

    public function notice_delete($id){
        NoticeBoard::find($id)->delete();
        return redirect('notice_board')->with('delete_success',' ');
    }

    public function inactive($id){
        NoticeBoard::find($id)->update(['status'=>0]);
        return Redirect()->back();
    }

    public function active($id){
        NoticeBoard::find($id)->update(['status'=>1]);
        return Redirect()->back();
    }
}
