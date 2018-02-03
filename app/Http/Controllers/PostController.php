<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    

    public function index()
    {
        $posts = Post::where('id' , ">" , '0')->where('approved' , '1')->orderBy('id' , 'desc')->paginate('5');
        return view('welcome' , compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        $categories = Category::all();
        return view('post.create' , compact('categories'));
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
            ->withErrors($validator)
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


    public function profile($id)
    {
        $user = User::find($id);
        return view('users.profile' , [ 'user' => $user , 'id' => $id ] );

    }


    
}
