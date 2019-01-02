<?php

namespace App\Http\Controllers;

use App\PartnerNote;
use Illuminate\Http\Request;

class PartnerNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partner_notes = (new PartnerNote)->newQuery();
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
        $partner_note = PartnerNote::create([
                'content' => $request->content,
                'partner_id' => $request->partner_id
        ]);
        $listnotes = PartnerNote::where('partner_id',$request->partner_id)->get();
        $listnote = [];
        foreach ($listnotes as $value) {
            $vl = $value->toArray();
            $vl["link"] = "{{route('admin.partnernote.destroy',['partnernote'=>".$value->id."])}}";
            array_push($listnote, $vl); 
        }
        // dd($listnote);
        return $listnote;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PartnerNote  $partnerNote
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerNote $partnerNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PartnerNote  $partnerNote
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerNote $partnerNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PartnerNote  $partnerNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerNote $partnerNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PartnerNote  $partnerNote
     * @return \Illuminate\Http\Response
     */
    public function destroy($partnerNote)
    {
        $partnerNote = PartnerNote::findOrFail($partnerNote);
        // dd(1);
        $partnerNote->delete();
        return 1;
    }
    public function delete(Request $request)
    {
        $partnerNote = PartnerNote::findOrFail($request->id);
        $partnerNote->delete();
        return 1;
    }
    public function search(Request $request)
    {
        $partner_notes = (new PartnerNote)->newQuery();
        if($request->keyword != null)
        {
            $partner_notes = $partner_notes->where('content','like', '%'.$request->keyword.'%');
        }
        if($request->start_day != null)
        {
            $partner_notes = $partner_notes->where('created_at','>',$request->start_day);
        }
        if($request->end_day != null)
        {
            $partner_notes = $partner_notes->where('created_at','<',$request->end_day);
        }
        $partner_notes = $partner_notes->where('partner_id',$request->partner_id)->get();
        $partner_note = [];
        foreach ($partner_notes as $value) {
            $vl = $value->toArray();
            $vl["link"] = "{{route('admin.partnernote.destroy',['partnernote'=>".$value->id."])}}";
            array_push($partner_note, $vl); 
        }
        return $partner_note;
    }
}
