<?php

namespace App\Http\Controllers;

use App\Blog;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index',compact('blog'));
    }
    public function blogdelete($blog_id)
    {
        $del = Blog::find($blog_id);
       if($del->blog_photo != 'blog_default_photo.jpg'){
                $location = base_path('public/uploads/blog/').$del->blog_photo;
                unlink($location);
            }
       $del->delete();
        
        
        //  Blog::find($blog_id)->delete();
        return back()->with('blog_delete','Blog delete Successfully');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.blog_add');
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
            'blog_title'=>'required',
            'blog_content'=>'required',
            'blog_photo' => 'file|mimes:jpg,jpeg,png|max:500',
        ]);
        
        $form_db = Blog::create([
            'blog_title' =>$request->blog_title,
            'blog_content' =>$request->blog_content,
            'created_at'=>Carbon::now(),
        ]);

        $uploaded_category_photo = $request->file('blog_photo');
        $new_category_photo_name = $form_db->id.'.'.$uploaded_category_photo->extension();
        $new_category_photo_location = base_path('public/uploads/blog/'.$new_category_photo_name);
        Image::make($uploaded_category_photo)->save($new_category_photo_location);

        Blog::find($form_db->id)->update([
            'blog_photo'=> $new_category_photo_name,
        ]);
        return back()->with('blog_success','Blog Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->all();
        if($request->hasFile('blog_photo')){
            if($blog->blog_photo != 'blog_default_photo.jpg'){
                $delete_location = base_path('public/uploads/blog/'.$blog->blog_photo);
                unlink( $delete_location );

            }
            $uploaded_blog_photo = $request->file('blog_photo');
            $new_blog_photo_name = $blog->id.'.'.$uploaded_blog_photo->extension();
            $new_blog_photo_location = base_path('public/uploads/blog/'.$new_blog_photo_name);
            Image::make($uploaded_blog_photo)->save($new_blog_photo_location);
            $blog->blog_photo = $new_blog_photo_name;
        }
        $blog->blog_title = $request->blog_title;
         $blog->blog_content = $request->blog_content;
        $blog->save();
        
        return back()->with('blog_edit','Blog Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
