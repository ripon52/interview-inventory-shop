<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\Storage;
trait FileTrait
{
    public static function fileRename(){
        return now()->format("Ymd")."_n".time().random_int(1111,9999);
    }


    public static function FileProcessing(
        $file,
        $folderPath = null,
        $height     = 800,
        $width      = 800
    )
    {
        $dynamicPath = public_path($folderPath);

        if (!file_exists($dynamicPath)){
            if (!mkdir($dynamicPath, 0777, TRUE) && !is_dir($dynamicPath)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $dynamicPath));
            }
        }

        $extension = $file->getClientOriginalExtension();
        $fileName = self::fileRename().'.'.$extension;


        if ($extension !== "gif" && $extension !== "mp4"){

            $img = Image::make($file->path());
            $img->resize($width,$height, function ($constraint) {
                $constraint->aspectRatio();
            })->save($dynamicPath.'/'.$fileName);
        }else{
           $file->move($dynamicPath."/".$fileName);
        }

        $dirWithFileName =  "{$folderPath}/{$fileName}";
        Log::info("Uploaded Path & Name is ".json_encode($dirWithFileName));

        return $dirWithFileName;
    }

    public function unlinkFile($pathWithFileName)
    {
        Log::info("Unlink Path : ".$pathWithFileName);

        if (Storage::disk("public")->exists($pathWithFileName)){
            Storage::disk("public")->delete($pathWithFileName);
        }

//        if (file_exists($pathWithFileName)){
//            @unlink($pathWithFileName);
//        }
    }
}
