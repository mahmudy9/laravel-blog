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
        $posts = User::find(Auth::id())->posts()->orderBy('id' , 'desc')->paginate('1');
        return view('users.posts' , compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'title' => 'required|max:255',
            'category' => 'required|numeric',
            'body' => 'required|min:100'
        ]);
        if($validator->fails())
        {
            return redirect()->back()
            ->withErrors()
            ->withInput();
        }
        $post = new Post;
        $post->title = $request->input('title');
        $post->user_id = Auth::id();
        $post->category_id = $request->input('category');
        $post->body = $request->input('body');
        $post->save();
        $slug = strtolower(str_replace( " " , "-" ,$post->title));
        return redirect('post/show/'.$post->id."/".$slug);

    }


    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show' , compact('post') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(Auth::id())
        {
            $id = Auth::id();
            $user = User::find($id);
        return view('users.profile' , [ 'user' => $user , 'id' => $id ] );
        }
        return abort(404);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::id())
        {
            $user = User::find(Auth::id());
            return view('users.edit' , compact('user'));
        }
        return abort(404);
        
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
            if(Auth::id())
            {
                $id = Auth::id();
                $validator = Validator::make($request->all() , [
                    'name' => 'required|min:3',
                    'email' => 'required|email|unique:users.email'
                ]);
                if($validator->fails())
                {
                    return redirect()->back()->withErrors();
                }
                $user = User::find($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->save();
                return redirect()->back();
            }
        
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
