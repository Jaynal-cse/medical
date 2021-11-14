<?php

namespace App\Http\Controllers;

use App\FrontendFooterSignupForm;
use Illuminate\Http\Request;

class FrontendFooterSignupFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $FrontendFooterSignupForms = FrontendFooterSignupForm::all();
        return view('admin.footer.footerSignUpForm.view',compact('FrontendFooterSignupForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email'=>'required|email|unique:frontend_footer_signup_forms|regex:/(.+)@(.+)\.(.+)/i',
        ]);
        FrontendFooterSignupForm::insert([
            'email'=>$request->email,
        ]);
        return redirect('/')->with('added_success',' ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendFooterSignupForm  $frontendFooterSignupForm
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendFooterSignupForm $frontendFooterSignupForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendFooterSignupForm  $frontendFooterSignupForm
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendFooterSignupForm $frontendFooterSignupForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendFooterSignupForm  $frontendFooterSignupForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrontendFooterSignupForm $frontendFooterSignupForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendFooterSignupForm  $frontendFooterSignupForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendFooterSignupForm $frontendFooterSignupForm)
    {
        //
    }

    public function footer_sign_up_form_delete($id)
    {
        FrontendFooterSignupForm::find($id)->delete();
        return redirect('frontend_footer_signup')->with('delete_success',' ');
    }
}
