<?php

namespace App\Http\Controllers;

use App\SetUp;
use Illuminate\Http\Request;
use App\Http\Requests\EditSetUpsTableRequest;
use Intervention\Image\ImageManagerStatic as Image;

class SetUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\SetUp  $setUp
     * @return \Illuminate\Http\Response
     */
    public function show(SetUp $setUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SetUp  $setUp
     * @return \Illuminate\Http\Response
     */
    public function edit($setUp)
    {
        $setup = SetUp::findOrFail($setUp)->first();
        return view("admin.setup.edit", compact('setup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SetUp  $setUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $setup)
    {       
        // dd($request);
        $request->validate([
            'website_name' => 'required|max:63',
            'description' => 'max:250',
            'thank_you' => 'required',
            'logo_header' => 'mimes:jpeg,bmp,png,jpg,gif',
            'logo_footer' => 'mimes:jpeg,bmp,png,jpg,gif',
            'sell_my_home' => 'required',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/|max:100',
            'lisence' => 'required|max:250',
            'address' => 'required|max:250',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required'
        ]);
        $set = SetUp::findOrFail($setup);
        // dd($set);
        $set->website_name = $request->website_name;
        $set->description = $request->description;
        if(isset($request->logo_header))
        {
            $image_header = $request->logo_header;
            $file = $image_header;
            if(!empty($file))
            {
                $image_resize = Image::make($file->getRealPath());         
                // $image_resize->resize(230, 100);
                $path = 'upload/imagehouse'.uniqid().".".$file->getClientOriginalExtension();
                $image_resize = $image_resize->save($path);
                $set->logo_header = $path;
            }
        }
        if(isset($request->logo_footer))
        {
            $image_footer = $request->logo_footer;
            $file = $image_footer;
            if(!empty($file))
            {
                $image_resize = Image::make($file->getRealPath());              
                // $image_resize->resize(230, 100);
                $path = 'upload/imagehouse'.uniqid().".".$file->getClientOriginalExtension();
                $image_resize = $image_resize->save($path);
                $set->logo_footer = $path;
            }
        }
        $set->sell_my_home = $request->sell_my_home;
        $set->thank_you = $request->thank_you;
        $set->phone = $request->phone;
        $set->email = $request->email;
        $set->address = $request->address;
        $set->facebook = $request->facebook;
        $set->instagram = $request->instagram;
        $set->twitter = $request->twitter;
        $set->lisence = $request->lisence;
        $set->save();
        session()->flash("success", "Successfully update setup");
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetUp  $setUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(SetUp $setUp)
    {
        //
    }
}
