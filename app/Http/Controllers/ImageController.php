<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function createimage(Request $request){
        $path = $request->file_name->store('public/images');
        dd($path);
    }
}
