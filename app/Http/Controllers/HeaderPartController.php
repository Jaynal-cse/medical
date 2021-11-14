<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Frontend;
use App\Submenu;
use Image;

class HeaderPartController extends Controller
{
    public function frontend(){
      $frontends = Frontend::orderBy('created_at','desc')->get();
     return view('admin.frontend.index', compact('frontends'));
   }
   public function add_menu(){
     
     return view('admin.frontend.add_menu');
   }
   public function frontendpost(Request $request){
      $request->validate([
            'menu'=> 'required',
        ]);
      $form_db = Frontend::create([
         'menu' =>$request->menu,
         'url' =>$request->url,
         'created_at'=> now(),

     ]);
        return back()->with('menu','Menu added successfully');
    }
    public function frontendedit($frontend_id){
       $frontend_edits = Frontend::find($frontend_id);
      return view('admin.frontend.edit', compact('frontend_edits'));
    }
    public function frontendeditpost(Request $request){
      Frontend::find($request->frontend_id)->update([
         'menu'=>$request->menu,
         'url'=>$request->url,
      ]);
      return back()->with('frontend_edit','Frontend Edit Successfully');
    }
    public function frontendactive($frontend_id){
      $frontend_active = Frontend::find($frontend_id);
      if($frontend_active->status == 0){
         Frontend::find($frontend_id)->update([
              'status'=>1,
          ]);
      }
      else{
            Frontend::find($frontend_id)->update([
                'status'=>0,
             ]);
            }
      return back()->with('frontend_status','Frontend status Successfully change');
  }
    public function frontenddelete($frontend_id){
      Frontend::find($frontend_id)->delete();
      return back()->with('frontend_delete','Frontend Delete Successfully');
    }
    
    
    public function submenu(){
        $submenus = Submenu::orderBy('created_at','desc')->get();
       
        
        return view('admin.frontend.sub-menu.index', compact('submenus'));
    }
    public function add_submenu(){
       $menu = Frontend::orderBy('created_at','desc')->get();
     return view('admin.frontend.sub-menu.add_submenu', compact('menu'));
   }
    public function subedit($sub_id){
        $sub_edits = Submenu::find($sub_id);
        $menu = Frontend::orderBy('created_at','desc')->get();
      return view('admin.frontend.sub-menu.edit', compact('sub_edits','menu'));
    }
    
    public function subeditpost(Request $request){
        $request->validate([
            'menu_id'=> 'required',
        ]);
      Submenu::find($request->sub_id)->update([
         'menu_id'=>$request->menu_id,
         'submenu'=>$request->submenu,
         'suburl'=>$request->suburl,
      ]);
      return back()->with('Submenu_edit','Submenu Edit Successfully');
    }
    
    public function subactive($sub_id){
      $Submenu_active = Submenu::find($sub_id);
      if($Submenu_active->status == 0){
         Submenu::find($sub_id)->update([
              'status'=>1,
          ]);
      }
      else{
            Submenu::find($sub_id)->update([
                'status'=>0,
             ]);
            }
      return back()->with('Submenu_status','Submenu status Successfully change');
  }
  
     public function submenudelete($submenu_id){
      Submenu::find($submenu_id)->delete();
      return back()->with('submenu_delete','Submenu Delete Successfully');
    }
    
    public function submenu_post(Request $request){
        Submenu::insert([
          'menu_id'=>$request->menu_id,
         'submenu'=>$request->submenu,
         'suburl'=>$request->suburl,
        'created_at' => now(),
      ]);
      return back()->with('submenu','Submenu insert Successfully');
    }
    
    
    
   
}
