<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function uploadImage($file, $folder, $width = null, $height = null)
    {
        $imageName = uniqid(9) . '.' . $file->getClientOriginalExtension();
       
        if (!is_dir($folder)) {
            mkdir($folder);
        }

        $imageFile = Image::make($file);
        if (isset($width) && isset($height)) {
            $imageFile->resize($width, $height);
        }

        $imageFile->save($folder . '/' . $imageName);

        return $folder.'/'.$imageName;
    }
}
