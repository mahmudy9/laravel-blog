<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
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
        $category = Category::find($categoryid->id);
        return view('category_posts' , compact('category','category_name'));
    }
}
