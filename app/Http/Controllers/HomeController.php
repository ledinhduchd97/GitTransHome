<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderFooter;
use App\SetUp;
use Auth;
use Validator;
use Hash;
use App\User;

class HomeController extends Controller
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
    public function getLogin()
    {
        $hf = HeaderFooter::get()->first(); //Content text của header và footer
        $setup = SetUp::get()->first();
        if (Auth::check()) {
            return redirect()->route('get.index.admin');
            
        }
        // dd($setup);
        return view('login',compact('hf','setup')); 
        
    }
    public function login(Request $request)
    {

        $request->validate([
           'username' => 'required|min:3|max:30|regex:/^[a-zA-Z0-9]+$/' ,
           'password' => 'required|min:6|max:18|regex:/^[a-zA-Z0-9]+$/'
        ],
        [
            'username.required' => 'Username can not be empty',
            'username.min' => 'The username or password entered does not match the account entered',
            'username.max' => 'The username or password entered does not match the account entered',
            'username.regex' => 'The username or password entered does not match the account entered',
            'password.required' => 'Password can not be empty',
            'password.min' => 'The username or password entered does not match the account entered',
            'password.max' => 'The username or password entered does not match the account entered',
            'password.regex' => 'The username or password entered does not match the account entered'
        ]);
        $remember = 0;
        if (!empty($request->remember)) 
        {
            $remember = 1;
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status_active' => 1], $remember))
        {
            if(Auth::user()->status == 2)
            {
                session(['fail' => 'Your account Not Active']);
                return redirect()->route('get.logout');
            }
            else
            {
                return redirect()->route('admin.tasks.index');
            }  
        }
        else
        {
            session(['fail' => 'Login Fail']);
            return back();
        }
    }

    public function logout(){
        if(Auth::check())
        {
            Auth::logout();
            return redirect()->route('get.login');
        }
    }

    public function changePassword($id, Request $request){
        if(Auth::Check())
        {
            $rules = [
                'current_password' => 'required|min:6|max:18',
                'password' => 'required|same:password|min:6|max:18',
                'password_confirmation' => 'required|same:password',     
            ];
    
            $validator = Validator::make($request->only(['current_password', 'password', 'password_confirmation']), $rules);
            if($validator->fails())
            {
                return response()->json([
                    'message' => "Oops! Something went wrong",
                    'error' => $validator->getMessageBag()->toArray()
                ], 400);
            }
            else
            {  
                $current_password = Auth::User()->password;
                if(Hash::check($request->current_password, $current_password))
                {                             
                    $user = User::find($id);
                    $user->password = Hash::make($request->password);
                    $user->save(); 
                    return response()->json([
                        'message' => 'Success'
                    ], 200);
                }
                else
                {           
                    $error = [
                        'current_password' => ['Please enter correct current password']
                    ];
                    return response()->json([
                        'error' => $error
                    ], 400);   
                }
            }        
        }
        else
        {
            return response()->json([
                'message' => "Please login"
            ], 400);
        }   
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
