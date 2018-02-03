<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $number = [];
        foreach($categories as $category):
            $num = Post::where('category_id' , "=" , $category->id )->count();
            $number[$category->name] = $num;
        endforeach;
        return view('categories', compact('categories' , 'number'));
    }

    public function postsByCategory($category_name)
    {   
        $categoryid = Category::where('name' , $category_name)->firstOrFail();
        $posts = Post::where('category_id', '=' , $categoryid->id)
        ->where('approved' , '=' , '1')->orderBy('id' , 'desc')->paginate('5');
        return view('category_posts' , compact('posts','category_name'));
    }


}
