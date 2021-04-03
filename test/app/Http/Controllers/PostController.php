<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Str;
class PostController extends Controller
{


    //delete record 

    public function delete($id)
    {
        $data = Post::find($id);
        $data->delete();
       
    }

    //update the record 

    public function update($id)
    {
        // $data = Post::find($id);
        // $data->title = "new heloo";
        // $data->body = "hi hi hi hi ";
        // $data->slug = Str::slug("new heloo");
        // $data->user_id = "22";
        // $data->save();

        //other way 

        Post::where('id',$id)->update([
            'title'=>'upated title',
            'body' => 'hi mother fucker '
        ]);
    }

//Display  single  records 
    public function show($id)
    {

        $data = Post::find($id);
        dd($data);



    }

    //get the frist matching records 

    public function getPost()
    {
      $post=   Post::where('user_id',1)->first();
      return ($post);
    }



    //Display records 
    public function index()
    {
       $data = Post::all();
      //  $data = Post::where('id',1)->get();// if you want specific record 
        dd($data);
    }





    //store post
    public function store()
    {

        // mass assignment error here so to fix use fillable or guarded array in model
        Post::create([
            'title'=>$title='this is my title 33',
            'slug' =>Str::slug($title),
            'body' =>'hello again more',
            'user_id'=>'14'


        ]);




        //   $post = new Post;
        //   $post->title = "new title";
        //   $post->body = "a new body";
        //   $post->slug = Str::slug($post->title);
        //   $post->user_id = 1 ; 
        //   $post->save();
    }
}
