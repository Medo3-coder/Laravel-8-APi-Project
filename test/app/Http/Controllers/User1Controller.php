<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Validator as ValidationValidator;
use Validator;

class User1Controller extends Controller
//passport
{
    public function registration(Request $request)
    {
       $validation = Validator::make($request->all(),[

        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required',
        'C_password'=>'required|same:password',

       ]);

       if($validation->fails())
       {
           return response()->json($validation->errors(),202);
       }
       $allData = $request->all();
       $allData['password'] = bcrypt($allData['password']);

       $user = User::create($allData);

       $resArr =[];  // inti  to generate token
       $resArr['token'] = $user->createToken('api-application')->accessToken;
       //passing the name
       $resArr['name'] = $user->name ;

       return response()->json($resArr , 200);
    }

    public function login(Request $request)
    {

        if(Auth::attempt([
            'email' => $request->email,
             'password' => $request->password
             ]))

             {

                $user = Auth::user();


                $resArr =[];  // inti  to generate token
                $resArr['token'] = $user->createToken('api-application')->accessToken;
                //passing the name
                $resArr['name'] = $user->name ;

                return response()->json($resArr , 200);





             }
             else{
                return response()->json(['error'=>'unauthorized Access'],203);
            }
    }
}
