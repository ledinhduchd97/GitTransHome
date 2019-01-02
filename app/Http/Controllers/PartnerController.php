<?php

namespace App\Http\Controllers;

use App\Partner;
use App\PartnerView;
use Illuminate\Http\Request;
use Validator;
use Response;
use Auth;
use App\PartnerNote;

class PartnerController extends Controller
{
    private $partner;
    /**
     *
     */
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partners = (new Partner)->newQuery();
        $key = $request->keyword;
        $status = $request->status;
        $start = $request->start_day;
        $end = $request->end_day;
        if($request->keyword != null)
        {
            $partners = $partners->where('fullname','like', '%'.$request->keyword.'%');
        }
        // dd($partners);
        if($request->status != null)
        {
            $partners = $partners->where('status','like', '%'.$request->status.'%');
        }
        if($request->start_day != null)
        {
            $partners = $partners->where('created_at','>',$request->start_day);
        }
        if($request->end_day != null)
        {
            $partners = $partners->where('created_at','<',$request->end_day);
        }

        $partners = $partners->where('status_recycle',1)->paginate(20);
        $partners->withPath("?keyword=$key&status=$status&start_day=$start&end_day=$end");
        // dd($partners);
        $view = count(Partner::where('status_recycle',1)->get());
        $recycle = count(Partner::where('status_recycle',0)->get());
        return view('admin.partner.index',compact('partners','view','recycle'));
    }
    public function recycle(Request $request)
    {
        $partners = (new Partner)->newQuery();
        $key = $request->keyword;
        $status = $request->status;
        $start = $request->start_day;
        $end = $request->end_day;
        if($request->keyword != null)
        {
            $partners = $partners->where('fullname','like', '%'.$request->keyword.'%');
        }
        if($request->status != null)
        {
            $partners = $partners->where('status',$request->status);
        }
        if($request->start_day != null)
        {
            $partners = $partners->where('created_at','>',$request->start_day);
        }
        if($request->end_day != null)
        {
            $partners = $partners->where('created_at','<',$request->end_day);
        }
        $partners = $partners->where('status_recycle',0)->paginate(20);
        $partners->withPath("?keyword=$key&status=$status&start_day=$start&end_day=$end");
        $view = count(Partner::where('status_recycle',1)->get());
        $recycle = count(Partner::where('status_recycle',0)->get());
        return view('admin.partner.recycle',compact('partners','view','recycle'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $rules = [
            'patner_fullname' => 'required|min:6|max:50',
            'patner_email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/',
            'patner_phone' => 'required|regex:/^[0-9 \(\)-]+$/'
        ];
        $messages = [
            'patner_fullname.required' => 'Fullname can not be empty',
            'patner_fullname.min' => 'Fullname contains at least 6 characters',
            'patner_fullname.max' => 'Fullname not more than 50 characters',
            'patner_email.required' => 'Email can not be empty',
            'patner_phone.required' => 'Phone can not be empty'

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return Response::json([
                'message' => $validator->errors()->toJson()
            ], 400);
        }
        else
        {
            $partner = Partner::create([
                'fullname' => $request->patner_fullname,
                'email' => $request->patner_email,
                'phone' => $request->patner_phone,
                'status' => '-'
            ]);
            return Response::json([
                'message' => "Success"
            ], 200);
        }
    }

    public function addPartner(Request $request) {
        $rules = [
            'fullname' => 'required',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/',
            'date_of_birth' => 'required',
            'address' => 'required',
            'partner_type' => 'required',
            // 'note' => 'required'
        ];
        $request->validate($rules);
        
        $this->partner->create($request->all());
        session()->flash('success', 'Add partner success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show($partner, Request $request)
    {
        $id = $partner;
        $partner = Partner::findOrFail($partner);
        $tasks = $partner->partner_task_to_dos();
        if($request->customer_search) {
            $tasks = $tasks->where('partner_id', $id)
                            ->where('title', 'like', '%' . $request->customer_search . '%')
                            ->orWhere('type', 'like', '%' . $request->customer_search . '%');
        }
        if($request->date_from && $request->date_to) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $to = date("Y-m-d", strtotime($request->date_to));
            $tasks = $tasks->where('partner_id', $id)
                            ->whereBetween('created_at', array($from, $to))
                            ->orWhereBetween('deadline', array($from, $to));
        }
        if(isset($request->status))
        {
            if($request->status == 0 || $request->status == 1) {
            $tasks = $tasks->where('partner_id', $id)->where('status', $request->status);
            }    
        }
        
        $tasks = $tasks->paginate(10);
        // dd($partner->partner_note);
        $view = count(Partner::where('status_recycle',1)->get());
        $recycle = count(Partner::where('status_recycle',0)->get());
        return view('admin.partner.show', compact('partner', 'view', 'recycle', 'tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($partner)
    {
        $partner = Partner::findOrFail($partner);
        return view('admin.partner.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $partner)
    {
        $rules = [
            'fullname' => 'required',
            'email' => 'required|regex:/^[\w.+\-]+@gmail\.com$/',
            'phone' => 'required|regex:/^[0-9 \(\)-]+$/',
            'date_of_birth' => 'required',
            'address' => 'required',
            'partner_type' => 'required',
            // 'note' => 'required'
        ];
        $request->validate($rules);
        $partner = Partner::findOrFail($partner);
        $request->merge(['user_update' => Auth::id()]);
        $partner->update($request->all());
        session()->flash('success', 'Update success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();
        session(['success' => 'Sucessfully delete a Partner']);
        return back();
    }
    public function deleteRecycle($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->status_recycle = 0;
        $partner->save();
        session(['success' => 'Sucessfully delete a partner in the trash !']);
        return back();
    }
    public function undo($id)
    {
        $partner = Partner::findOrFail($id);
        // dd($partner);
        $partner->status_recycle = 1;
        $partner->save();
        session(['success' => 'Successfully recover a Partner !']);
        return back();
    }
    public function edit_partner_view()
    {
        $partner = PartnerView::get()->first();
        return view('admin.partner.editview',compact('partner'));
    }
    public function update_partner_view(Request $request)
    {
        $partner = PartnerView::get()->first();
        $request->validate(
            [
               'title' => 'required|min:6|max:100',
               'short_desc' => 'required|min:6|max:150',
               'detail_desc' => 'required',
               'image_avatar' => 'mimes:jpeg,bmp,png,jpg,gif',      
            ],
            [
            ]
        );
        $partner->title = $request->title;
        $partner->short_desc = $request->short_desc;
        $partner->detail_desc = $request->detail_desc;
        if(isset($request->image_avatar)){
            $images = $request->image_avatar;
            $file = $images;
            if(!empty($file)){
                $photo = $file->move('upload', 'imagepartner'.uniqid().".".$file->getClientOriginalExtension());
                $partner->image_avatar = $photo;
            }
        }
        $partner->save();
        session(['success' => 'Edit abouts success !']);
        return redirect()->route('admin.partner.editview');
    }
    public function getNotePartner(Request $request)
    {
        $notes = PartnerNote::where('partner_id',$request->id)->get();
        return $notes;
    }
}
