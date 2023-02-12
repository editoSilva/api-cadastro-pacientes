<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{

    public function __construct()
    {

    }

    public function upload(Request $request)
    {

        $nameFile = null;
    

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));
    
            $extension = $request->image->extension();
                
            $nameFile = "{$name}.{$extension}";

            $upload = $request->image->storeAs('image', $nameFile);

        }
    }

}