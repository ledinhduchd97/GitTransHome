<?php

namespace App\Http\Controllers;

use App\CustomerNote;
use Illuminate\Http\Request;

class CustomerNoteController extends Controller
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
        $customer_note = CustomerNote::create([
                'content' => $request->content,
                'customer_id' => $request->customer_id
        ]);
        $listnotes = CustomerNote::where('customer_id',$request->customer_id)->get();
        $listnote = [];
        foreach ($listnotes as $value) {
            $vl = $value->toArray();
            array_push($listnote, $vl); 
        }
        // dd($listnote);
        return $listnote;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerNote  $customerNote
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerNote $customerNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerNote  $customerNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerNote $customerNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerNote  $customerNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerNote $customerNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerNote  $customerNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerNote $customerNote)
    {
        //
    }
    public function delete(Request $request)
    {
        $customerNote = CustomerNote::findOrFail($request->id);
        $customerNote->delete();
        return 1;
    }
    public function search(Request $request)
    {
        $customer_notes = (new CustomerNote)->newQuery();
        if($request->keyword != null)
        {
            $customer_notes = $customer_notes->where('content','like', '%'.$request->keyword.'%');
        }
        if($request->start_day != null)
        {
            $customer_notes = $customer_notes->where('created_at','>',$request->start_day);
        }
        if($request->end_day != null)
        {
            $customer_notes = $customer_notes->where('created_at','<',$request->end_day);
        }
        $customer_notes = $customer_notes->where('customer_id',$request->customer_id)->get();
        $customer_note = [];
        foreach ($customer_notes as $value) {
            $vl = $value->toArray();
            array_push($customer_note, $vl); 
        }
        return $customer_note;
    }
}
