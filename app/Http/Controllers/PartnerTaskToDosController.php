<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartnerTaskToDos;

class PartnerTaskToDosController extends Controller
{
    protected $task;

    public function __construct(PartnerTaskToDos $task)
    {
        $this->task = $task;
    }
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
        return view('admin.partner.tasks.create');
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
            'title' => 'required|max:250',
            'age' => 'required|numeric',
            'type' => 'required',
            'update' => 'required|numeric',
            'ranking' => 'required',
            'contract' => 'numeric',
        ];
        $request->validate($rules);
        $this->task->create($request->all());
        session()->flash('success', 'Add succesfully');
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = PartnerTaskToDos::findOrFail($id);
        return view("admin.partner.tasks.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = PartnerTaskToDos::findOrFail($id);
        return view("admin.partner.tasks.edit", compact("task"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = PartnerTaskToDos::findOrFail($id);
        $rules = [
            'title' => 'required|max:250',
            'age' => 'required',
            'type' => 'required',
            'update' => 'required',
            'ranking' => 'required'
        ];
        $request->validate($rules);
        $task->title = $request->title;
        $task->age = $request->age;
        $task->update = $request->update;
        $task->type = $request->type;
        $task->deadline = $request->deadline;
        $task->status = $request->status;
        $task->invest = $request->invest;
        $task->contract = $request->contract;
        $task->ranking = $request->ranking;
        $task->invest = $request->invest;
        $task->created_at = $request->created_at;
        $task->save();
        session()->flash('success', 'Update succesfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = PartnerTaskToDos::findOrFail($id);
        $task->delete();
        session()->flash('success', 'Delete success');
        return back();
    }
}
