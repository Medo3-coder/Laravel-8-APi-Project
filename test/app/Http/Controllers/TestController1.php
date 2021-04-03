<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class TestController1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['name'=>'iphone' ,'price'=>'299'] ;
        return view('test',compact('data'));
    }

    public function register()
    {
        return "register page ";
    }

    public function login()

    {
        return "login page";
    }

    public function create()
    {
        //show the form 



        return view('product.create');
        
    }

    public function store(Request $request)
    {
        //to submit the form 

        $this->validate($request,[
            'title'=>'required|min:3|max:20',
            'description'=>'required'
        ]);
       
   
        //return redirect()->back();
      //  return redirect('/test');
      return back()->with('message','your product was created successfully');

    }
}