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

    public function updateImage($fileImage,$path,$oldImage){
        $file = $fileImage;
        $image = "";
        if(!empty($file)){
            if(file_exists($path.'/'.$oldImage)){
                unlink($path.'/'.$oldImage);
            }
            $image = sha1(time()).'.'.$file->getClientOriginalExtension();
            $file->move($path,$image);
        }else{
            $image = $oldImage;
        }
        return $image;
    }

    public function deleteRecord($model,$id,$path)
    {
        $categoryOld = $model::findOrfail($id)->image;
        if(file_exists($path."/".$categoryOld)){
            unlink($path."/".$categoryOld);
        }
        $model::destroy($id);
    }
}
