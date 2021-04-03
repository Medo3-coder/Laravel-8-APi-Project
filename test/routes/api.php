<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ReController;
use App\Http\Controllers\DummyAPI;

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\User1Controller;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's

  //  Route::get("list" , [DeviceController::class , 'list']);

    Route::post("add" , [DeviceController::class , 'add']);

    //search Api route

     Route::get("search/{name}" , [DeviceController::class , 'search']);

    });



//Route::get("data" , [DummyAPI::class , 'getData']);


//get data by id if id not found go and get all data  {? important to check if id found or not }

//Route::get("list/{id?}" , [DeviceController::class , 'list']);






//get all data by id
//Route::get("list/{id}" , [DeviceController::class , 'listbyParams']);




Route::put("update/{id}" , [DeviceController::class ,'update' ]);




//delete Api route

Route::delete("delete/{id}" ,[DeviceController::class , 'delete']);

//valiation

Route::post("save", [DeviceController::class , 'testData']);

//resource controller

//Route::resource("fun",MemberController::class);




//Route::resource('user', [MemberController::class]);



//Route::apiResource("Post", ReController::class);


Route::post("login",[UserController::class,'index']);


Route::post("upload" , [FileController::class , "upload"]);

//--------------------------------------------------------------------


//route for test passport

Route::post("/register" , [User1Controller::class ,'registration' ]);

Route::post("/login" , [User1Controller::class ,'login' ]);

//to test unauthorized user
Route::get("/login" , [User1Controller::class ,'login' ]);


Route::middleware('auth:api')->get("list" , [DeviceController::class , 'list']);
