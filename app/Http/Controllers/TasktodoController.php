<?php

namespace App\Http\Controllers;

use App\Tasktodo;
use Illuminate\Http\Request;
use App\Customer;
class TasktodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tasks = Tasktodo::latest();
        $recycle = Tasktodo::onlyTrashed()->count();
        $view = Tasktodo::all()->count();
        $key = $request->keyword;
        $sta = $request->status;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        if($request->keyword) {
            $tasks = $tasks->withTitleOrName($key,false);
        }
        // dd($tasks);
        if($request->status) {
            $tasks = $tasks->withStatus($sta);
        }
        if($date_from && $date_to) {
            $from = date("Y-m-d", strtotime($date_from));
            $to = date("Y-m-d", strtotime($date_to));
            $tasks = $tasks->withStartAndDeadline($from, $to);
        }
        $tasks = $tasks->orderBy('start_task','asc')->paginate(10);
        
        $tasks->withPath("?keyword=$key&status=$sta&date_from=$date_from&date_to=$date_to");
        return view('admin.task_to_do.index', compact('tasks', 'recycle', 'view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::orderBy('first_name', 'asc')->get();
        return view('admin.task_to_do.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:250|regex:/^[a-zA-Z0-9 ]+$/',
                'customer_id' => 'required',
                'to_do_type' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
                'start_task' => 'required',
                'deadline' => 'required',
                'note' => 'required|max:250',
                'ranking' => 'required',
                'status' => 'required',
                'assigned' => 'required',
            ],
            [
        ]);
        $time_['e'] = strtotime($request->deadline);
        $time_['s'] = strtotime($request->start_task);
        $time_work = $time_['e']-$time_['s'];
        $day = floor($time_work/(60*60*24)); // số ngày cần thực hiện
        $hour = $time_work%(60*60*24); // lấy số giờ làm 
        $hour = floor( $hour / (60*60) );
        $min = $time_work%(60*60); // lấy số phút
        $min = $min /60;
        if (!$request->age) {
            $request->age = "-";
        }
        $start_task = date('Y-m-d\TH:i', strtotime($request->start_task));
        $deadline = date('Y-m-d\TH:i', strtotime($request->deadline));
        $tasktodo = Tasktodo::create([
            'title' => $request->title,
            'customer_id' => $request->customer_id,
            'to_do_type' => $request->to_do_type,
            'start_task' => $start_task,
            'deadline' => $deadline,
            'note' => $request->note,
            'ranking' => $request->ranking,
            'status' =>  $request->status,
            'assigned' => $request->assigned,
            'age'=> $day,
            // 'update' => '-',
        ]);
        session(['success' => 'Add task to do successfully']);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasktodo  $tasktodo
     * @return \Illuminate\Http\Response
     */
    public function show($tasktodo)
    {
        $task = Tasktodo::findOrFail($tasktodo);
        $recycle = Tasktodo::onlyTrashed()->count();
        $view = Tasktodo::all()->count();
        return view('admin.task_to_do.show', compact('task', 'recycle', 'view'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasktodo  $tasktodo
     * @return \Illuminate\Http\Response
     */
    public function edit($tasktodo)
    {
        $tasktodo = Tasktodo::findOrFail($tasktodo);
        $customers = Customer::orderBy('first_name','asc')->get();
        // dd($customers);
        return view('admin.task_to_do.edit',compact('tasktodo','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasktodo  $tasktodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $task)
    {
        // dd(1);
        $request->validate(
            [
                'title' => 'required|max:250|regex:/^[a-zA-Z0-9 ]+$/',
                'customer_id' => 'required',
                'to_do_type' => 'required|regex:/^[a-zA-Z0-9 ]+$/',
                'start_task' => 'required',
                'deadline' => 'required',
                'note' => 'required|max:250',
                'ranking' => 'required',
                'status' => 'required',
                'assigned' => 'required',
            ],
            [
        ]);
        $time_['e'] = strtotime($request->deadline);
        $time_['s'] = strtotime($request->start_task);
        $time_work = $time_['e']-$time_['s'];
        $day = floor($time_work/(60*60*24)); // số ngày cần thực hiện
        $hour = $time_work%(60*60*24); // lấy số giờ làm 
        $hour = floor( $hour / (60*60) );
        $min = $time_work%(60*60); // lấy số phút
        $min = $min /60;
        $start_task = date('Y-m-d\TH:i', strtotime($request->start_task));
        $deadline = date('Y-m-d\TH:i', strtotime($request->deadline));
        $tasktodo = Tasktodo::findOrFail($task);
        // dd($tasktodo);
        $tasktodo->title = $request->title;
        $tasktodo->customer_id = $request->customer_id;
        $tasktodo->to_do_type = $request->to_do_type;
        $tasktodo->start_task = $start_task;
        $tasktodo->deadline = $deadline;
        $tasktodo->note = $request->note;
        $tasktodo->ranking = $request->ranking;
        $tasktodo->status = $request->status;
        $tasktodo->assigned = $request->assigned;
        $tasktodo->age = $day;
        $tasktodo->save();
        session(['success' => 'Edit task to do successfully']);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasktodo  $tasktodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($tasktodo)
    {
        $task = Tasktodo::findOrFail($tasktodo);
        $task->delete();
        session(['success' => 'Sucessfully delete tasks to do']);
        return redirect()->route('admin.tasks.index');
    }

    public function getRecycle(Request $request)
    {
        $tasks = Tasktodo::onlyTrashed()->latest();
        $recycle = Tasktodo::onlyTrashed()->count();
        $view = Tasktodo::all()->count();
        $key = $request->keyword;
        $sta = $request->status;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        if($request->keyword) {
            $tasks = $tasks->withTitleOrName($request->keyword);
        }

        if($request->status) {
            $tasks = $tasks->withStatus($request->status);
        }

        if($request->date_from && $request->date_to) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $to = date("Y-m-d", strtotime($request->date_to));
            $tasks = $tasks->whereBetween('created_at', array($from, $to));
        }

        $tasks = $tasks->orderBy('start_task','asc')->paginate(10);
        $tasks->withPath("?keyword=$key&status=$sta&date_from=$date_from&date_to=$date_to");
        return view('admin.task_to_do.recycle', compact('tasks', 'recycle', 'view'));
    }

    public function putRestore($id)
    {
        $tasks = Tasktodo::withTrashed()->findOrFail($id);
        $tasks->restore();
        session(['success' => 'Successfully restore record']);
        return back();
    }

    public function deletePermanently($id)
    {
        $tasks = Tasktodo::withTrashed()->findOrFail($id);
        $tasks->forceDelete();
        session(['success' => 'Successfully permanently delete record']);
        return back();
    }
}
