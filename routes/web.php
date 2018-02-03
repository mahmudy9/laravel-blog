<?php

use Illuminate\Http\Request;
//use Validator;
use App\Contact;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'PostController@index')->name('home');

Route::get('/about' , function(){
    return view('about');
});

Route::post('/contact/store' , function(Request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'body' => 'required|min:10'
    ]);
    if ($validator->fails())
    {
        return redirect()->back()->withInput()->withErrors($validator);
    }

    $contact = new Contact;
    if(Auth::user())
    {
    $contact->name =  Auth::user()->name;
    $contact->email =  Auth::user()->email;
    }
    else
    {
    $contact->name = $request->input('name'); 
    $contact->email = $request->input('email'); 
    }
    $contact->body = $request->input('body'); 
    $contact->save();
    return redirect()->back();
});


Route::get('/contact' , function(){
    return view('contact');
});


Route::get('/myposts' , 'UsersController@index');

Route::get('/showprofile' , 'UsersController@show');

Route::get('/editprofile' , 'UsersController@edit');

Route::post('/updateprofile' , 'UsersController@update');

Route::get('/user/profile/{id}' , 'PostController@profile');
Route::get('/post/create' , 'PostController@createPost');
Route::post('/post/store' , 'PostController@storePost');
Route::get('/post/show/{id}/{slug}' , 'PostController@showPost');

Route::get('/categories/{category_name}' , 'CategoryController@postsByCategory');
Route::get('/categories' , 'CategoryController@index');

Route::get('/dashboard/notapproved' , 'AdminController@notApproved');
Route::get('/dashboard/approvepost/{id}' , 'AdminController@approvePost');
Route::get('/dashboard/disapprovepost/{id}' , 'AdminController@disapprovePost');
Route::get('/dashboard/editpost/{id}' , 'AdminController@editPost');
Route::post('/dashboard/updatepost/{id}' , 'AdminController@updatePost');
Route::get('/dashboard/deletepost/{id}' , 'AdminController@deletePost');
Route::post('/dashboard/destroypost/{id}' , 'AdminController@destroyPost');
Route::get('/dashboard/postslist' , 'AdminController@postsList');
Route::post('/dashboard/canceldeletenotapproved' , 'AdminController@notApproved');


Route::get('/dashboard/userslist' , 'AdminController@usersList');
Route::get('/dashboard/deleteuser/{id}' , 'AdminController@deleteUser');
Route::post('/dashboard/destroyuser/{id}' , 'AdminController@destroyUser');
Route::post('/dashboard/canceluser' , 'AdminController@usersList');


Route::get('/dashboard/categories' , 'AdminController@categoriesList');
Route::get('/dashboard/addcategory' , 'AdminController@addCategory');
Route::post('/dashboard/storecategory' , 'AdminController@storeCategory');
Route::get('dashboard/deletecategory/{id}' , 'AdminController@deleteCategory');
Route::post('dashboard/destroycategory/{id}' , 'AdminController@destroyCategory');
Route::post('dashboard/cancelcategory' , 'AdminController@categoriesList');

Route::get('/dashboard/contacts' , 'AdminController@contacts');
Route::get('/dashboard/deletecontact/{id}' , 'AdminController@deleteContact');
Route::post('/dashboard/destroycontact/{id}' , 'AdminController@destroyContact');
Route::post('/dashboard/cancel' , 'AdminController@contacts');



Route::get('/dashboard' , 'AdminController@index');
