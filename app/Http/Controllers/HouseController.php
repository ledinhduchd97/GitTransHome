<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\UpdateHouseRequest;
use App\Image;
use Validator;
use Response;
use Illuminate\Http\Request;
use App\Http\Requests\HouseStoreRequest;
use Auth;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = count(House::where('active_status',1)->get());
        $recycle = count(House::where('active_status',0)->get());
        $site_area = $request->get('site_area', NULL);
        $area_gross_floor = $request->get('area_gross_floor', NULL);
        $name = $request->get('name', NULL);
        $price = $request->get('price',NULL);
        $status = $request->get('status',NULL);
        $start_day = $request->get('start_day');
        $end_day = $request->get('end_day');
        $houses = (new House)->newQuery();
        if ($site_area != NULL) 
        {
            $houses = $houses->SearchArea($site_area);
        }
        if ($name != NULL) 
        {
            $houses = $houses->where('name','like', '%'.$name.'%');
            
        }
        if ($area_gross_floor != NULL) 
        {
            $houses = $houses->SearchAreaGross($area_gross_floor);
        }
        if( $price != NULL)
        {
            $houses = $houses->SearchPrice($price);
        }
        if( $status != NULL )
        {
            $houses = $houses->SearchStatus($status);
        }
        if ($start_day != NULL) 
        {
            $houses = $houses->where('created_at','>', $start_day);
        }
        if ($end_day != NULL) 
        {
            $houses = $houses->where('created_at','<', $end_day);
        }
        $houses = $houses->where('active_status',1)->orderBy('created_at', 'desc')->paginate(10);
        $houses->withPath("?name=$name&site_area=$site_area&area_gross_floor=$area_gross_floor&price=$price&status=$status&start_day=$start_day&end_day=$end_day");
        return view('admin.house.index',compact('houses','recycle','view'));
    }

    public function recycle(Request $request)
    {
        $view = count(House::where('active_status',1)->get());
        $recycle = count(House::where('active_status',0)->get());
        $site_area = $request->get('site_area', NULL);
        $area_gross_floor = $request->get('area_gross_floor', NULL);
        $name = $request->get('name', NULL);
        $price = $request->get('price',NULL);
        $status = $request->get('status',NULL);
        $start_day = $request->get('start_day');
        $end_day = $request->get('end_day');
        $houses = (new House)->newQuery();
        if ($site_area != NULL) 
        {
            $houses = $houses->SearchArea($site_area);
        }
        if ($name != NULL) 
        {
            $houses = $houses->where('name','like', '%'.$name.'%');
        }
        if ($area_gross_floor != NULL) 
        {
            $houses = $houses->SearchAreaGross($area_gross_floor);
        }
        if( $price != NULL)
        {
            $houses = $houses->SearchPrice($price);
        }
        if( $status != NULL )
        {
            $houses = $houses->SearchStatus($status);
        }
        if ($start_day != NULL) 
        {
            $houses = $houses->where('created_at','>', $start_day);
        }
        if ($end_day != NULL) 
        {
            $houses = $houses->where('created_at','<', $end_day);
        }
        $houses = $houses->where('active_status',0)->orderBy('created_at', 'desc')->paginate(10);
        $houses->withPath("?name=$name&site_area=$site_area&area_gross_floor=$area_gross_floor&price=$price&status=$status&start_day=$start_day&end_day=$end_day");
        return view('admin.house.recycle',compact('houses','recycle','view'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.house.create');
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
           'name' => 'required|max:100',
            'code' => 'required|max:10',
            'note' => 'max:250',
            'phone' => 'required|max:13|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required|max:250',
            'area' => 'required',
            'number_bedroom' => 'required|numeric',
            'number_bathroom' => 'required|numeric',
            'site_area' => 'required|numeric',
            'area_gross_floor' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required',
            'image_home' => 'required',
            'image_thumb'=> 'required', 
            'image' => 'required',
            'video' => 'required',
            'description' => 'max:250',
            'brokerage' => 'required|max:100',
            'agent' => 'required|max:100',
            'license' => 'required',
            'mls' => 'required|max:25',
            'zipcode' => 'required|max:10',
            'builded_year' => 'required|numeric',
        ],
        [
            'site_area.required' => 'The living area field is required',
            'site_area.numeric' => 'The living area field must be number',
            'area_gross_floor.required' => 'The lot size  field is required',
            'area_gross_floor.numeric' => 'The lot size field must be number',
        ]);
        $house = House::create([
            'name' => $request->name,
            'code' => $request->code,
            'note' => $request->note,
            'user_id' => $request->user_id,
            'address' => $request->address,
            'phone' => $request->phone,
            'area' => $request->area,
            'number_bedroom' => $request->number_bedroom,
            'number_bathroom' => $request->number_bathroom,
            'area_gross_floor' => $request->area_gross_floor,
            'site_area' => $request->site_area,
            'price' => $request->price,
            'unit' => $request->unit,
            'video' => $request->video,
            'description' => $request->description,
            'brokerage' => $request->brokerage,
            'agent' => $request->agent,
            'license' => $request->license,
            'mls' => $request->mls,
            'zipcode' => $request->zipcode,
            'builded_year' => $request->builded_year,
            'status' => $request->status,
            'active_status' => 1
        ]);
        if(isset($request->image_home)){
            $images = $request->image_home;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                Image::create([
                    'link' => $photo,
                    'house_id' => $house->id,
                    'level' => 1
                ]);
            }

        }
        if(isset($request->image)){
            $images = $request->image;
            if(is_array($images)){
                for($i = 0 ; $i < sizeof($images) ; $i++){
                    $file = $images[$i];
                    if(!empty($file)){
                        $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                        Image::create([
                            'link' => $photo,
                            'house_id' => $house->id,
                            'level' => 2
                        ]);
                    }
                }
            }
        }
        if(isset($request->image_thumb)){
            $images = $request->image_thumb;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                Image::create([
                    'link' => $photo,
                    'house_id' => $house->id,
                    'level' => 3
                ]);
            }

        }
        session(['success' => 'Successfully add new house !']);
        return redirect()->route('admin.house.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        return view('admin.house.show',compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        // dd($house);
        return view('admin.house.edit',compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $house)
    {
        $request->validate([
           'name' => 'required|max:100',
            'code' => 'required|max:10',
            'note' => 'max:250',
            'phone' => 'required|max:13|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required|max:250',
            'area' => 'required',
            'number_bedroom' => 'required|numeric',
            'number_bathroom' => 'required|numeric',
            'site_area' => 'required|numeric',
            'area_gross_floor' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required',
            'video' => 'required',
            'description' => 'max:250',
            'brokerage' => 'required|max:100',
            'agent' => 'required|max:100',
            'license' => 'required',
            'mls' => 'required|max:25',
            'zipcode' => 'required|max:10',
            'builded_year' => 'required|numeric',
        ],
        [
            'site_area.required' => 'The living area field is required',
            'site_area.numeric' => 'The living area field must be number',
            'area_gross_floor.required' => 'The lot size  field is required',
            'area_gross_floor.numeric' => 'The lot size field must be number',
        ]);
        $house = House::findOrFail($house);  
        $house->name = $request->name;
        $house->code = $request->code;
        $house->note = $request->note;
        $house->address = $request->address;
        $house->phone = $request->phone;
        $house->area = $request->area;
        $house->site_area = $request->site_area;
        $house->number_bedroom = $request->number_bedroom;
        $house->number_bathroom = $request->number_bathroom;
        $house->area_gross_floor = $request->area_gross_floor;
        $house->price = $request->price;
        $house->unit = $request->unit;
        $house->description = $request->description;
        $house->brokerage = $request->brokerage;
        $house->agent = $request->agent;
        $house->license = $request->license;
        $house->mls = $request->mls;
        $house->zipcode = $request->zipcode;
        $house->builded_year = $request->builded_year;
        $house->user_update = $request->user_update;
        if(isset(explode("=", $request->video)[1]))
        {
            $house->video = "https://www.youtube.com/embed/" . explode("=", $request->video)[1];
        }
        else
        {
            $house->video = $request->video;
        }
        $house->status = $request->status;

        if($request->hasFile("image_home")) {
            $images = Image::where('house_id', $house->id)->isHome()->get();
            foreach($images as $image)  {
                $image->delete();
            }

            $images = $request->image_home;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                $house->images()->create([
                    'link' => $photo,
                    'level' => 1
                ]);
            }

        }
        if($request->hasFile("image_thumb")){
            $images = Image::where('house_id', $house->id)->isThumb()->get();
            foreach($images as $image)  {
                $image->delete();
            }
            $images = $request->image_thumb;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                $house->images()->create([
                    'link' => $photo,
                    'level' => 3
                ]);
            }
        }
        if($request->hasFile("image") || $request->images_slide) {
            if(is_array($request->images_slide)) {
                $images_db = Image::where('house_id', $house->id)->isImageSlide()->get();
                foreach($images_db as $image) {
                    if(!in_array($image->id, $request->images_slide)) {
                        $img = Image::findOrFail($image->id)->delete();
                    }

                }
            }

            $images = $request->image;
            if(is_array($images)){
                for($i = 0 ; $i < sizeof($images) ; $i++){
                    $file = $images[$i];
                    if(!empty($file)){
                        $photo = $file->move('upload', 'imagehouse'.uniqid().".".$file->getClientOriginalExtension());
                        $house->images()->create([
                            'link' => $photo,
                            'level' => 2
                        ]);
                    }
                }
            }
        }
        // $house->user_updated()->update([
        //     'user_update' => Auth::user()->id,
        // ]);
        // $house->update($request->all());
        $house->update();
        session()->flash('success', 'Successfully update house');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\House  $house
     * @return \Illuminate\Http\Response
     */
    public function deleteRecycle($id)
    {
            $house = House::findOrFail($id);
            if($house)
            {
                $house->active_status = 0;
                $house->save();
                session(['success' => 'Sucessfully delete a House in the trash']);
                return redirect()->route('admin.house.index'); 
            }
            else
                return redirect()->route('admin.house.index');
    }
    public function undo($id)
    {
        $house = House::findOrFail($id);
        if($house)
        {
            $house->active_status = 1;
            $house->save();
            session(['success' => 'Successfully recover a House']);
            return redirect()->route('admin.house.recycle');
        }
        else
            return redirect()->route('admin.user.recycle');
    }
    public function destroy(House $house)
    {
        $house->delete();
        session(['success' => 'Sucessfully delete a House']);
        return redirect()->route('admin.house.recycle');
    }
}
