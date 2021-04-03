<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DummyAPI extends Controller
{

    public function getData()
    {
        return ["name"=>"anil" , "email"=>"me@yahoo.com" , "address"=>"hola" ];
    }
}
