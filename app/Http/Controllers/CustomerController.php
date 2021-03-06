<?php

namespace App\Http\Controllers;
use App\Customer;
use App\Http\Requests\AddCustomerRequest;
use App\Http\Requests\EditCustomerRequest;
use Validator;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\CustomerNote;
use App\CustomerTaskToDo;
use DB;

class CustomerController extends Controller
{
    private $customer;
    /**
     *
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::byLatest();
        $recycle = Customer::onlyTrashed()->count();
        $view = Customer::all()->count();
        $keyword = $request->keyword;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        if($request->keyword) {
            $customers = $customers->withFullName($request->keyword);
        }
        if($request->date_from && $request->date_to) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $to = date("Y-m-d", strtotime($request->date_to));
            $customers = $customers->whereDate('created_at', ">=" , $from)->whereDate('created_at', "<=" , $to);
        }else if($request->date_from){
            $from = date("Y-m-d", strtotime($request->date_from));
            $customers = $customers->whereDate('created_at', ">=" ,$from);
        }else if($request->date_to){
            $to = date("Y-m-d", strtotime($request->date_to));
            $customers = $customers->whereDate('created_at', "<=" ,$to);
         }

        $customers = $customers->paginate(10);
        $customers->withPath("?keyword=$keyword&date_from=$date_from&date_to=$date_to");
        return view('admin.customer.index', compact('customers', 'recycle', 'view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
                'first_name' => 'required|max:65|regex:/^[a-zA-Z ]+$/',
                'last_name' => 'required|max:65|regex:/^[a-zA-Z ]+$/',
                'birthday' => 'required',
                'email' => 'required|unique:customers',
                'phone' => 'required|min:10|max:16|regex:/^[0-9 \(\)-]+$/',
                'address' => 'required',
                'type' => 'max:255' 
            ],
            [
            ]
        );
        $this->customer->create($request->all());
        session(['success' => 'Successfully Add new Customer']);
        return back();
    }
    public function checkEmail(Request $request)
    {
        $email = Customer::where('email',$request->email)->first();
        if($email)
        {
            return Response::json([
                'message' => 'The email has already been taken'
            ],400);
        }
        else
        {
            return response()->json([
                'message' => 'Success'
            ], 200);
        }
    }
    public function storeCustomer(Request $request) 
    {
        // dd($request);
        $rules = [
            'first_name' => 'required|max:65',
            'email' => 'required|unique:customers|max:255',
            'phone' => 'required|min:10|max:16|regex:/^[0-9 \(\)-]+$/',
            'address' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return Response::json([
                'message' => $validator->getMessageBag()->toArray()
            ], 400);
        }
        $customer = Customer::create([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return response()->json([
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer, Request $request)
    {
        $id = $customer;
        $customer = Customer::findOrFail($customer);
        $tasks = $customer->customer_task_to_dos();
        $count = count(CustomerTaskToDo::where('customer_id',$id)->get());
        $customers = $request->customer_search;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        $status = $request->status;

        if($request->customer_search) {
            $tasks = $tasks->where('customer_id', $id)
                            ->where('title', 'like', '%' . $request->customer_search . '%');
        }
        if($request->date_from && $request->date_to) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $to = date("Y-m-d", strtotime($request->date_to));
            $tasks = $tasks->where('customer_id', $id)->whereDate('deadline',">=",$from)->whereDate('deadline',"<=",$to);
        }
        elseif ($request->date_from) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $tasks = $tasks->where('customer_id', $id)->whereDate('deadline',">=",$from);
        }
        elseif($request->date_to)
        {
            $to = date("Y-m-d", strtotime($request->date_to));
            $tasks = $tasks->where('customer_id', $id)->whereDate('deadline',"<=",$to);
        }
        
        if (isset($request->status)) {
            if($request->status == 0 || $request->status == 1) 
            {
                $tasks = $tasks->where('customer_id', $id)->where('status',$request->status);
            }
        }
        $tasks = $tasks->paginate(10);
        $tasks->withPath("?customer_search=$customers&status=$status&date_from=$date_from&date_to=$date_to");
        $recycle = Customer::onlyTrashed()->count();
        $view = Customer::all()->count();
        return view('admin.customer.show', compact('customer', 'recycle', 'view', 'tasks','count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer, Request $request)
    {
        $customer = Customer::findOrFail($customer);

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update($customer, EditCustomerRequest $request)
    {
        $customer = Customer::findOrFail($customer);
        $customer->update($request->all());
        session(['success' => 'Sucessfully edit customer']);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        $customer = Customer::findOrFail($customer);
        $customer->delete();
        session(['success' => 'Sucessfully delete customer']);
        return back();
    }

    public function getRecycle(Request $request)
    {
        $customers = Customer::onlyTrashed()->byLatest();
        $recycle = Customer::onlyTrashed()->count();
        $view = Customer::all()->count();
        $keyword = $request->keyword;
        $date_from = $request->date_from;
        $date_to = $request->date_to;
        if($request->keyword) {
            $customers = $customers->withFullNameTrash($request->keyword);
        }

        if($request->date_from && $request->date_to) {
            $from = date("Y-m-d", strtotime($request->date_from));
            $to = date("Y-m-d", strtotime($request->date_to));
            $customers = $customers->whereDate('created_at', ">=" , $from)->whereDate('created_at', "<=" , $to);
        }else if($request->date_from){
            $from = date("Y-m-d", strtotime($request->date_from));
            $customers = $customers->whereDate('created_at', ">=" ,$from);
        }else if($request->date_to){
            $to = date("Y-m-d", strtotime($request->date_to));
            $customers = $customers->whereDate('created_at', "<=" ,$to);
         }

        $customers = $customers->paginate(10);
        $customers->withPath("?keyword=$keyword&date_from=$date_from&date_to=$date_to");
        return view('admin.customer.recycle', compact('customers', 'recycle', 'view'));
    }

    public function putRestore($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->tasktodo()->restore();
        $customer->restore();
        // dd($customer->tasktodo()->get());
        
        session(['success' => 'Successfully restore record']);
        return back();
    }

    public function deletePermanently($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->tasktodo()->forceDelete();
        $customer->forceDelete();
        session(['success' => 'Successfully permanently delete record']);
        return back();
    }
    public function getNoteCustomer(Request $request)
    {
        $notes = CustomerNote::where('customer_id',$request->id)->get();
        return $notes;
    }
}
