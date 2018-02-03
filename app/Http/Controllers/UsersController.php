<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Validator;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = User::find(Auth::id())->posts()->where('approved' , '1')->orderBy('id' , 'desc')->paginate('5');
        return view('users.posts' , compact('posts') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
            $id = Auth::id();
            $user = User::find($id);
        return view('users.profile' , [ 'user' => $user , 'id' => $id ] );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
            $user = User::find(Auth::id());
            return view('users.edit' , compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
                $id = Auth::id();
                $validator = Validator::make($request->all() , [
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:users.email'
                ]);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors($vlidator);
                }
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();
                return redirect()->back();
    }
        
}

   
