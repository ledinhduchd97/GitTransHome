<?php

namespace App\Http\Controllers;

use App\SetUp;
use Illuminate\Http\Request;
use App\Sellmyhome;
use App\Http\Requests\EditSetUpsTableRequest;
use Intervention\Image\ImageManagerStatic as Image;
use App\TableInfo;
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
            // 'sell_my_home' => 'required',
            'phone' => 'required|min:10|max:16|regex:/^[0-9 \(\)-]+$/',
            'email' => 'required|max:100',
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
        // $set->sell_my_home = $request->sell_my_home;
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
    public function editSellmyhome($id)
    {
        $sellmyhome = Sellmyhome::findOrFail($id);
        $table_infos = TableInfo::all();
        return view('admin.setup.edit_sellmyhome',compact('sellmyhome','table_infos'));
    }
    public function updateSellmyhome(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|max:190',
            'title_1' => 'required|max:190',
            'description_1' => 'required|max:190',
            'image_1' => 'mimes:jpeg,bmp,png,jpg,gif',
            'title_image_1' => 'required|max:190',
            'description_image_1' => 'required|max:190',
            'image_2' => 'mimes:jpeg,bmp,png,jpg,gif',
            'title_image_2' => 'required|max:190',
            'description_image_2' => 'required|max:190',
            'image_3' => 'mimes:jpeg,bmp,png,jpg,gif',
            'title_image_3' => 'required|max:190',
            'description_image_3' => 'required|max:190',
            'title_2' => 'required|max:190',
            'description_2' => 'required',
            'column_1' => 'max:190',
            'column_2' => 'max:190',
            'column_3' => 'max:190',
        ],
        [
        ]);
        $sellmyhome = Sellmyhome::findOrFail($id);
        if(isset($request->image_1))
        {
            $image_1 = $request->image_1;
            $image = $image_1;
            if(!empty($image))
            {
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(100, 100);       
                $path = 'upload/sellmyhome'.uniqid().".".$image->getClientOriginalExtension();
                $image_resize = $image_resize->save($path);
                $sellmyhome->image_1 = $path;
            }

        }
        if(isset($request->image_2))
        {
            $image_2 = $request->image_2;
            $image = $image_2;
            if(!empty($image))
            {
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(100, 100);         
                $path = 'upload/sellmyhome'.uniqid().".".$image->getClientOriginalExtension();
                $image_resize = $image_resize->save($path);
                $sellmyhome->image_2 = $path;
            }
            
        }
        if(isset($request->image_3))
        {
            $image_3 = $request->image_3;
            $image = $image_3;
            if(!empty($image))
            {
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(100, 100);         
                $path = 'upload/sellmyhome'.uniqid().".".$image->getClientOriginalExtension();
                $image_resize = $image_resize->save($path);
                $sellmyhome->image_3 = $path;
            }
            
        }
        $sellmyhome->note = $request->note;
        $sellmyhome->title_1 = $request->title_1;
        $sellmyhome->description_1 = $request->description_1;
        $sellmyhome->title_image_1 = $request->title_image_1;
        $sellmyhome->description_image_1 = $request->description_image_1;
        $sellmyhome->title_image_2 = $request->title_image_2;
        $sellmyhome->description_image_2 = $request->description_image_2;
        $sellmyhome->title_image_3 = $request->title_image_3;
        $sellmyhome->description_image_3 = $request->description_image_3;
        $sellmyhome->title_2 = $request->title_2;
        $sellmyhome->description_2 = $request->description_2;
        $sellmyhome->save();
        if($request->column_1 || $request->column_2 || $request->column_3)
        {
            TableInfo::truncate();
            function findMax($column_1,$column_2,$column_3)
            {
                $maxx = $column_1;
                if($maxx < $column_2)
                {
                    $maxx = $column_2;
                }
                if($maxx < $column_3)
                {
                    $maxx = $column_3;
                }
                return $maxx;
            }  
            $column_1 = count($request->column_1);
            $column_2 = count($request->column_2);
            $column_3 = count($request->column_3);
            // dd($request->column_1[0]);
            for ($i=0; $i < findMax($column_1,$column_2,$column_3) ; $i++) { 
                $table = TableInfo::create([
                    'column_1' => $request->column_1[$i],
                    'column_2' => $request->column_2[$i],
                    'column_3' => $request->column_3[$i],
                ]);
            }
        }
        session()->flash("success", "Successfully update sell my home");
        return back();
    }
}
