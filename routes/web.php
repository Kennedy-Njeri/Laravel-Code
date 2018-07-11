<?php

use App\Post;
use App\User;


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

//

Route::get('/', function() {


   return view('welcome');

});


//Route::get('/about', function () {


    //return "Hi about page";


//});



//Route::get('/contact', function () {


    //return "Hi i am Contact";


//});

//Route::get('/post/{id}/{name}', function($id, $name){


    //return "This is post number ". $id. " " . $name;



//});

//Route::get('/post/{id}', 'PostController@index');

//Route::get('/contact', 'PostController@contact');

//Route::get('post/{id}/{name}/{password}', 'PostController@show_post');

//Route::get('/post/{id}', 'PostsController@index');


//Route::resource('posts', 'PostsController');

//Route::get('/contact', 'PostsController@contact');

//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');


//Database raw sql queries

Route::get('/insert', function(){

    DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with laravel is great', 'Laravel is the best framework okay']);

});


//Route::get('/read', function() {

 //   $results = DB::select('select * from posts where id = ?', [1]);

  //  foreach($results as $post) {

        //var_dump($results);

      //  return $post->title;

  //  }

//});


//Route::get('/update', function(){

    //$updated = DB::update('update posts set title="update title" where id = ?', [1]);


    //return $updated;


//});

//Route::get('/delete', function (){

    //$deleted = DB::delete('delete from posts where id = ?', [1]);

    //return $deleted;

//});


//ELOQUENT

//Reading data

//Route::get('/read', function (){

 //$posts = Post::all();


 //foreach ($posts as $post) {

     //return $post->title;

 //}



//});



//Route::get('/find', function (){

    //$posts = Post::find(1);

    //return $posts->title;


    //foreach ($posts as $post) {

        //return $post->title;

    //}



//});

//Reading with constraints

//Route::get('/findwhere', function (){


    //with chaining
    //$posts = Post::where('id', 1)->orderBy('id', 'desc')->take(1)->get();

    //return $posts;


//});


//more ways to retrieve data
//Route::get('/findmore', function (){

    //$posts = Post::findOrFail(2);

    //return $posts;

    //$posts = Post::where('users_count', '<', 50)->findOrFail();



//});

//inserting-saving data


//Route::get('/basicinsert', function (){

  //$post = new Post;

  //$post->title = 'New Eloquent title';
  //$post->content = 'Eloquent is fun';

  //$post->save();


//});

//update
//Route::get('/basicinsert2', function (){

   // $post = Post::find(1);

   // $post->title = 'New Eloquent title 2';
   // $post->content = 'Eloquent is fun 2';

    //$post->save();


//});


//Create data and configuring mass assignment

//Route::get('/create', function (){


    //Post::create(['title'=>'the create method1', 'content'=>'Laravel is really fun to learn 1']);



//});

//Update with Eloquent

//Route::get('/update', function (){


    //Post::where('id', 2)->where('is_admin', '0')->update(['title'=>'New Laravel title', 'content'=>'Laravel is powerful']);


//});


//Delete with Eloquent

//method 1

//Route::get('/delete', function (){

    //$post = Post::find(6);

    //$post->delete();

//});

//Deleting Multiple Data

//Route::get('/delete2', function (){

    //Photo::destroy([4,5]);

//});


//SoftDelete

Route::get('/softdelete', function (){

    Post::find(6)->delete();

});


//Read SoftDelete
//Route::get('/readsoftdelete', function (){

    //$post = Post::find(7);

    //return $post;

    //with trashed column
    //$post = Post::withTrashed()->where('id', 7)->get();

    //return $post;

    //$post = Post::onlyTrashed()->where('is_admin', 0)->get();

    //return $post;

//});

//Restore Deleted items
//Route::get('/restore', function (){

    //Post::withTrashed()->where('is_admin', 0)->restore();

//});


//Delete Permanently
//Route::get('/forcedelete', function (){

    //Post::onlyTrashed()->where('is_admin', 0)->forceDelete();

//});

//Eloquent Relationships
//One-to-one Relationship

//Route::get('/user/{id}/post', function($id){

//return User::find($id)->post->title;

//});

//Inverse of 1st one i.e finding the user belonging to that post

//Route::get('/post/{id}/user', function($id){

    //return Post::find($id)->user->name;

//});

//One-to-many Relationship
//we use echo coz return uses one value

Route::get('/posts', function(){

    $user = User::find(1);

    foreach ($user->posts as $post) {

  echo $post->title . "<br>";

    }


});

//Many-to-many Relationships

Route::get('/user/{id}/role', function ($id){

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();

    return $user;


    //foreach($user->roles as $role) {

       // return $role->name;

    //}

});

//Accessing the pivot/ intermediate table

Route::get('/user/pivot', function (){


    $user = User::find('1');

    foreach ($user->roles as $role){

        return $role->pivot;
    }


});