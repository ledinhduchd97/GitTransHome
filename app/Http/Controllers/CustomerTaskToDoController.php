<?php

namespace App\Http\Controllers;

use App\CustomerTaskToDo;
use Illuminate\Http\Request;

class CustomerTaskToDoController extends Controller
{
    protected $task;

    public function __construct(CustomerTaskToDo $task)
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
        return view('admin.customer.tasks.create');
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
            // 'age' => 'required',
            'type' => 'required',
            // 'update' => 'required',
            'ranking' => 'required'
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
        $task = CustomerTaskToDo::findOrFail($id);
        return view("admin.customer.tasks.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = CustomerTaskToDo::findOrFail($id);
        return view("admin.customer.tasks.edit", compact("task"));
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
        $task = CustomerTaskToDo::findOrFail($id);
        $rules = [
            'title' => 'required|max:250',
            'type' => 'required',
            'ranking' => 'required'
        ];
        $request->validate($rules);
        $task->update($request->all());
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
        $task = CustomerTaskToDo::findOrFail($id);
        $task->delete();
        session()->flash('success', 'Delete success');
        return back();
    }
}
