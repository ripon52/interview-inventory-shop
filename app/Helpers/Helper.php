<?php
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\File;


if (!function_exists('user')){
    function user(){

        return auth()->user();
    }
}

if (!function_exists('userID')){
    function userID()
    {

        return auth()->id();
    }
}

if (!function_exists('userRoles')){
    function userRoles(){

        return ["admin","moderator"];
    }
}

if (!function_exists('currentRoute')){
    function currentRoute(){

        return request()->route()->getName();
    }
}


if (!function_exists('loggedUserName')){
    function loggedUserName(){

        return user()->name;
    }
}


if (!function_exists('userType')){
    function userType(){

        $isAdminOrModerator = user()->role == User::ADMIN ? User::ADMIN : User::MODERATOR;

        return ucfirst($isAdminOrModerator);
    }
}


if (!function_exists('moneyIcon')){
    function moneyIcon()
    {

        return "$";
    }
}


if (!function_exists('shopDateFormat')){
    function shopDateFormat($date = null)
    {

        return Carbon\Carbon::parse($date)->format("d-m-Y");
    }
}

if (!function_exists('shopDateTimeFormat')){
    function shopDateTimeFormat($dateTime = null)
    {

        return Carbon\Carbon::parse($dateTime)->format("h:i A, d-m-Y");
    }
}

if (!function_exists('shopMoneyFormat')){
    function shopMoneyFormat($amount = 0)
    {

        return number_format($amount,2);
    }
}


if (!function_exists('defaultImagePath')){
    function defaultImagePath()
    {

        return (new \App\Services\ProductService())::DEFAULT_FILE_PATH;

    }
}

if (!function_exists('productThumbnail')){
    function productThumbnail()
    {

        return (new \App\Services\ProductService())::THUMBNAIL;

    }
}


if (!function_exists('imageCoreDirectory')){
    function imageCoreDirectory()
    {

        return (new \App\Services\ProductService())::CORE_DIRECTORY;
    }
}

if (!function_exists('noImage')){
    function noImage()
    {

        return asset(imageCoreDirectory().'/noimage.png');
    }
}


if (!function_exists('imagePreview')){
    function imagePreview($fileName, $height = 100, $width=120)
    {
        if(empty($fileName)){
            return imgTag(noImage());
        }

        return File::exists($fileName)
            ?
            imgTag(asset($fileName), $height, $width)
            :
            imgTag(noImage() );
    }
}

if (!function_exists('imgTag')){
    function imgTag(
        $filePath = null,
        $height = 80,
        $width = 80,
        $classNames = null
    )
    {

        return "<img
                    src='$filePath'
                    style='height: {$height}px; width: {$width}px'
                    class='showImage ".$classNames."'
       />";
    }
}


if (!function_exists('showStatus')){
    function showStatus($status = 1, $btnSize = 1)
    {
        $btn_size = btnSize($btnSize);

        if ((int) $status === 1){
            return ' <button type="button" class="btn btn-success '.$btn_size.'"> <i class="fa fa-check"></i> Active </button> ';
        }

        return ' <button type="button" class="btn btn-danger '.$btn_size.'"> <i class="fa fa-2x fa-times-circle"></i> </button> ';
    }
}


if (!function_exists('btnSize')){
    function btnSize($size = 1)
    {
        if($size == 1){
            return "btn-sm";
        }

        if($size == 2){
            return "btn-xs";
        }

        if($size == 3){
            return "btn-lg";
        }
    }
}

if (!function_exists('activeInactiveOptions')){
    function activeInactiveOptions($active = "Active", $inactive = "In-Active")
    {

        return [
            1=>$active,
            2=>$inactive
        ];
    }
}

if (!function_exists('flashMessage')){
    function flashMessage($status = "success", $message = null)
    {

        return session()->flash($status,$message);
    }
}

if (!function_exists('ddError')){
    function ddError($e)
    {

       dd(
           $e->getMessage(),
           $e->getFile(),
           $e->getLine(),
       );
    }
}

if (!function_exists('moderatorRoutes')){
    function moderatorRoutes()
    {

       $moderatorRoutes = ["products.index","products.edit","products.update"];

       return in_array(currentRoute(), $moderatorRoutes);
    }
}


