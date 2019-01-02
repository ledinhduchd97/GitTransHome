<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;
use Session;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $aboutus = AboutUs::get()->first();
        return view('admin.aboutus.edit',compact('aboutus'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $aboutus = AboutUs::get()->first();
        $request->validate(
        [
           'title' => 'required|min:6|max:50',
           'short_description' => 'required|min:6|max:160',
           'detail_description' => 'required|max:500',
           'image_avatar' => 'mimes:jpeg,bmp,png,jpg,gif',
           'image_signature' => 'mimes:jpeg,bmp,png,jpg,gif',
            
        ],
        [
        ]);
        $aboutus->title = $request->title;
        $aboutus->short_description = $request->short_description;
        $aboutus->detail_description = $request->detail_description;
        if(isset($request->image_avatar)){
            $images = $request->image_avatar;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imageauboutus'.uniqid().".".$file->getClientOriginalExtension());
                $aboutus->image_avatar = $photo;
            }

        }
        if(isset($request->image_signature)){
            $images = $request->image_signature;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imageauboutus'.uniqid().".".$file->getClientOriginalExtension());
                $aboutus->image_signature = $photo;
            }

        }
        $aboutus->save();
        session(['success' => 'Edit about us success !']);
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
