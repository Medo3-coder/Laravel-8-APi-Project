<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $result = $request->file('file')->store('ApiDocs');
        return ["result" => $result];
    }
}
