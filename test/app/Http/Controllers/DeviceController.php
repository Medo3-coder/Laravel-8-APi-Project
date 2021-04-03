<?php

namespace App\Http\Controllers;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;
//use Dotenv\Validator;

class DeviceController extends Controller
{
    //recommended
    //public function list($id=null)

    //{
        // if return id ok  get it else id = null get all data
      //  return $id?Device::find($id):Device::all();
    //}


    public function list()
     {
         return Device::all();
     }

     public function listbyParams($id)

     {

          return  Device::find($id);
    }

    //save data in data base
    public function add(Request $request)
    {
        $device = new Device;
        $device->name = $request->name ;
        $device->member_id = $request->member_id ;
        $result =  $device->save();
        if($result)
        {
            return ["result" => "Data Has been saved"];
        }
        else
        {
            return ["result" => "Data Has not saved"];
        }

    }


    public function update(Request $request ,  $id)
    {
        $device = Device::find($id);
        $device->name = $request->name ;
        $device->member_id = $request->member_id ;
        $resullt = $device->save();
        if($resullt)
        {
            return ["result"=>"data is updated"];
        }
        else
        {
            return ["result"=>"data is not updated"];
        }



    }


    public function delete($id)
    {
        $device = Device::find($id);
        $resullt = $device->delete();
        if($resullt)
        {
            return ["resullt" => "record is deleted"];
        }
        else
        {
            return ["resullt" => "record is not deleted"];
        }
    }

    public function search($name)
    {
        //search for word
        $result = Device::where('name',$name)->get();

         //search by character and get all char related to search

        // $result =  Device::where('name','like' , '%'.$name.'%')->get();

         if(count($result))
         {
             return $result ;
         }
         else
         {
             return ["result" => "No records found"];

         }


         //return count($result)? $result:"Not matched";  another way to if statment
    }

    public function testData(Request $request)
    {
        $rules = [
            "member_id"=>"required|min:1|max:3",
            "name"=>"required"
        ];

        $validate = Validator::make($request->all(),$rules);


        if($validate->fails())
        {
            return response()->json($validate->errors(),401);
        }
        else
        {
            $device = new Device ;
            $device->name = $request->name ;
            $device->member_id = $request->member_id ;
            $resullt = $device->save();
            if($resullt)
            {
                return ["resullt"=>"data has been saved"];

            }
            else
            {
                return ["resullt"=>"data has not saved "];
            }
        }



    }




}
