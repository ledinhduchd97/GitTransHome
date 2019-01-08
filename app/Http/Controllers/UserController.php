<?php

namespace App\Http\Controllers;
use App\User;
use Validator;
use Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $view = count(User::where('status_active',1)->get());
        $recycle = count(User::where('status_active',0)->get());

        $position = $request->get('position', NULL);
        $status = $request->get('status', NULL);
        $start_day = $request->get('start_day', NULL);
        $end_day = $request->get('end_day',NULL);
        $users = (new User)->newQuery();
        if ($position != NULL) 
        {
            $users = $users->Position($position);
        }
        if ($status != NULL) 
        {
            $users = $users->Status($status);
        }
        if($start_day != NULL)
        {
            $users = $users->where('created_at','>',$start_day);
        }
        if($end_day != NULL)
        {
            $users = $users->where('created_at','<',$end_day);
        }
        $users = $users->where('status_active',1)->orderBy('created_at', 'desc')->paginate(5);
        $users->withPath("?position=$position&status=$status&start_day=$start_day&end_day=$end_day");
        return view('admin.user.index',compact('users','view','recycle'));
    }
    public function recycle(Request $request)
    {
        $view = count(User::where('status_active',1)->get());
        $recycle = count(User::where('status_active',0)->get());

        $position = $request->get('position', NULL);
        $status = $request->get('status', NULL);
        $start_day = $request->get('start_day', NULL);
        $end_day = $request->get('end_day',NULL);
        $users = (new User)->newQuery();
        if ($position != NULL) 
        {
            $users = $users->Position($position);
        }
        if ($status != NULL) 
        {
            $users = $users->Status($status);
        }
        if($start_day != NULL)
        {
            $users = $users->where('created_at','>',$start_day);
        }
        if($end_day != NULL)
        {
            $users = $users->where('created_at','<',$end_day);
        }
        $users = $users->where('status_active',0)->orderBy('created_at', 'desc')->paginate(10);
        $users->withPath("?position=$position&status=$status&start_day=$start_day&end_day=$end_day");
        return view('admin.user.recycle',compact('users','view','recycle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.user.adduser');
    }
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'fullname' => 'required|max:30|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|max:49|regex:/^[\w.+\-]+@gmail\.com$/|unique:users',
            'username' => 'required|min:3|max:50|unique:users|regex:/^[a-zA-Z0-9._]+$/',
            'password' => 'required|min:6|max:18',
            'confirm' => 'required|same:password',
            'sex' => 'required',
            'phone' => 'required|max:13|min:10|regex:/^[0-9 \(\)-]+$/',
            'birthday' => 'required',
            'address' => 'required',
            'position' => 'required',
        ],
        [
            'fullname.required' => '* Full name must be fill out',
            'fullname.max' => '* The fullname must be not over 30 characterss',
            'fullname.regex' => '* The fullname must be in correct format',
            'email.required' => '* Email must be fill out',
            'email.max' => 'The Email must be not over 50 characterss',
            'email.regex' => '* The email must be in the correct default format (@gmail.com)',
            'email.unique' => '* The Email is already used',
            'username.required' => '* Username must be fill out',
            'username.min' => '* Username must be at least 3 characters',
            'username.max' => '* The Username must be not over 50 characters',
            'username.unique' => '* The Username is already used',
            'username.regex' => '* The Username must be in correct format',
            'password.required' => '* Password must be fill out',
            'password.min' => '* Password must be at least 6 characters',
            'password.max' => '* Password must be not over 18 characters',
            'confirm.required' => '* Confirm password must be fill out',
            'confirm.same' => '* Confirm password mismatched',
            'sex.required' => '* Sex must be fill out',
            'phone.required' => '* Phone must be fill out',
            'phone.min' => '* Phone must be at least 10 characters',
            'phone.max' => '* Phone must be not over 13 characters',
            'birthday.required' => '* Date of birth must be fill out',
            'address.required' => '* Address must be fill out',
            'position.required' => '* Position must be select'
        ]);
        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'gender' => $request->sex,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'position' => $request->position,
            'status' => 2, //not active
            'status_active' => 1, //not in recycle,
            'comment' => 'abc'
        ]);
        session(['success' => 'Add account successfully']);
            return redirect()->route('admin.user.index');
    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if($user)
        {
            return view('admin.user.detailuser',compact('user'));
        }
        else
            return redirect()->route('admin.user.index');
        
    }

    public function deleteRecycle($id)
    {
        $user = User::findOrFail($id);
        if($user)
        {
            $user->status_active = 0;
            $user->save();
            session(['success' => 'Delete success an account to trash !']);
            return redirect()->route('admin.user.index');
        }
        else
            return redirect()->route('admin.user.index');
        
    }
    public function undo($id)
    {
        $user = User::findOrFail($id);
        if($user)
        {
            $user->status_active = 1;
            $user->save();
            session(['success' => 'Restore success an account !']);
            return redirect()->route('admin.user.recycle');
        }
        else
            return redirect()->route('admin.user.recycle');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edituser',compact('user'));
    }
    public function edit(Request $request, $id)
    {
        if ($request->password == "" && $request->confirm == "") {
            $request->validate([
                'fullname' => 'required|max:30|regex:/^[a-zA-Z ]+$/',
                'email' => 'required|max:50|regex:/^[\w.+\-]+@gmail\.com$/',
                'username' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9._]+$/',
                'phone' => 'required|min:10|max:13|regex:/^[0-9 \(\)-]+$/',
                'birthday' => 'required',
                'address' => 'required',
                'position' => 'required',
                'status' => 'required|numeric'
            ],
            [
               'fullname.required' => '* Full name must be fill out',
                'fullname.max' => '* The fullname must be not over 30 characters',
                'fullname.regex' => '* The fullname must be in correct format',
                'email.required' => '* Email must be fill out',
                'email.max' => 'The Email must be not over 50 characters',
                'email.email' => '* The Email must be in correct format',
                'email.regex' => '* The email must be in the correct default format (@gmail.com)',
                // 'email.unique' => '* The Email is already used',
                'username.required' => '* Username must be fill out',
                'username.min' => '* Username must be at least 3 characters',
                'username.max' => '* The Username must be not over 50 characters',
                // 'username.unique' => '* The Username is already used',
                'username.regex' => '* The Username must be in correct format',
                'phone.required' => '* Phone must be fill out',
                'phone.regex' => '* The phone must be in correct format',
                'phone.min' => '* Phone must be at least 10 characters',
                'phone.max' => '* Phone must be not over 13 characters',
                'birthday.required' => '* Date of birth must be fill out',
                'address.required' => '* Address must be fill out',
                'position.required' => '* Position must be select'
            ]);
        }
        else
        {
            $request->validate([
            'fullname' => 'required|max:99|regex:/^[a-zA-Z]+$/',
            'email' => 'required|max:50|regex:/^[\w.+\-]+@gmail\.com$/',
            'username' => 'required|min:3|max:50|regex:/^[a-zA-Z0-9._]+$/',
            'password' => 'required|min:6|max:18',
            'confirm' => 'required|same:password',
            'phone' => 'required|min:10|max:13|regex:/^[0-9 \(\)-]+$/',
            'birthday' => 'required',
            'address' => 'required',
            'position' => 'required',
            'status' => 'required|numeric'
            ],
            [
               'fullname.required' => '* Full name must be fill out',
                'fullname.max' => '* The fullname must be not over 99 characters',
                'fullname.regex' => '* The fullname must be in correct format',
                'email.required' => '* Email must be fill out',
                'email.max' => 'The Email must be not over 50 characters',
                'email.regex' => '* The email must be in the correct default format (@gmail.com)',
                // 'email.unique' => '* The Email is already used',
                'username.required' => '* Username must be fill out',
                'username.min' => '* Username must be at least 3 characters',
                'username.max' => '* The Username must be not over 50 characters',
                // 'username.unique' => '* The Username is already used',
                'username.regex' => '* The Username must be in correct format',
                'password.required' => '* Password must be fill out',
                'password.min' => '* Password must be at least 6 characters',
                'password.max' => '* Password must be not over 18 characters',
                'confirm.required' => '* Confirm password must be fill out',
                'confirm.same' => '* Confirm password mismatched',
                'phone.required' => '* Phone must be fill out',
                'phone.regex' => '* The phone must be in correct format',
                'phone.min' => '* Phone must be at least 10 characters',
                'phone.max' => '* Phone must be not over 13 characters',
                'birthday.required' => '* Date of birth must be fill out',
                'address.required' => '* Address must be fill out',
                'position.required' => '* Position must be select'
            ]);
        }
        $user = User::findOrFail($id);
            if($request->password)
            {
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->password = bcrypt($request->password);
                $user->phone = $request->phone;
                $user->birthday = $request->birthday;
                $user->address = $request->address;
                $user->position = $request->position;
                $user->status = $request->status;
                $user->save();
                session(['success' => 'Edit account successfully !']);
                return redirect()->route('admin.user.get_edit',['id'=>$id]);
            }
            else
            {
                $user->fullname = $request->fullname;
                $user->email = $request->email;
                $user->username = $request->username;
                $user->phone = $request->phone;
                $user->birthday = $request->birthday;
                $user->address = $request->address;
                $user->position = $request->position;
                $user->status = $request->status;
                $user->save();
                session(['success' => 'Edit account successfully !']);
                return redirect()->route('admin.user.get_edit',['id'=>$id]);
            }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        session(['success' => 'Delete success an account !']);
        $user->delete();
        return redirect()->route('admin.user.recycle');
    }
}
