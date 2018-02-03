<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\User;
use App\Post;
use App\Category;
use Validator;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth' ,'isAdmin']);
    }



    public function index()
    {
        $data = [];
        $data['contacts'] = Contact::all()->count();
        $data['users'] = User::where('level' , '0')->count();
        $data['approvedPosts'] = Post::where('approved' , '1')->count();
        $data['categories'] = Category::all()->count();
        $data['notApprovedPosts'] = Post::where('approved' , '0')->count();
        return view('admin.dashboard' , compact('data') );
    }



    public function contacts ()
    {
        $contacts = Contact::where('id' , '>' , "0")->orderBy('id' , 'desc')->paginate('2');
        return view('admin.contacts' , compact('contacts') );
    }



    public function deleteContact($id)
    {
        return view('admin.deletecontact' , compact('id'));
    }



    public function destroyContact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('dashboard/contacts');
    }



    public function categoriesList()
    {
        $categories = Category::where('id' , ">" , '0')->orderBy('name')->paginate('10');
        $number = [];
        foreach($categories as $category):
            $num = Post::where('category_id' , "=" , $category->id )->count();
            $number[$category->name] = $num;
        endforeach;

        return view('admin.categories' , compact('categories','number'));
    }



        public function addCategory()
    {
        //dd("me");
        return view('addcat');
    }



    public function storeCategory(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|min:3'
        ]);
        if($validator->fails())
        {
            return redrect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();
        return redirect('dashboard/categories');

    }



    public function deleteCategory($id)
    {
        return view('admin.deletecategory' , compact('id'));
    }

        public function destroyCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('dashboard/categories');
    }


    public function usersList()
    {
        $users = User::where('id' , '>' , '0')->where('level' , '=' , '0')->paginate('20');
        return view('admin.users' , compact('users'));
    }


    public function deleteUser($id)
    {
        return view('admin.deleteuser', compact('id'));
    }



    public function destroyUser($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect('dashboard/userslist');

    }



    public function notApproved()
    {

        $posts = Post::where('approved' , '=' , '0')->paginate('10');
        return view('admin.postsnotapproved' , compact('posts'));

    }


        public function postsList()
    {

        $posts = Post::where('approved' , '=' , '1')->paginate('10');
        return view('admin.postsapproved' , compact('posts'));

    }



    public function approvePost($id)
    {
        $post = Post::find($id);
        $post->approved = '1';
        $post->save();
        return redirect()->back();
    }


        public function disapprovePost($id)
    {
        $post = Post::find($id);
        $post->approved = '0';
        $post->save();
        return redirect()->back();
    }


    public function deletePost($id)
    {
        return view('admin.deletepost' , compact('id'));
    }


    public function destroyPost($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('dashboard/notapproved');
    }


    public function editPost($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.editpost' , compact('post' , 'categories'));
    }


    public function updatePost( Request $request ,$id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->category_id = $request->input('category');
        $post->body = $request->input('body');
        $post->save();
        return redirect('/dashboard');
    }



}
