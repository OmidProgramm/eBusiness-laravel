<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

trait ImageController
{
    public function uploadImage($fileImage,$path){
        $file = $fileImage;
        $image = "";
        if(!empty($file)){
            $image = sha1(time()).'.'.$file->getClientOriginalExtension();
            $file->move($path,$image);
        }
        return $image;
    }
}
