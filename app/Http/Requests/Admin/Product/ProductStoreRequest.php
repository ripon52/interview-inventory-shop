<?php

namespace App\Http\Requests\Admin\Product;

use App\Services\StatusCode;
use App\Traits\LogTrait;
use Illuminate\Foundation\Http\FormRequest;
class ProductStoreRequest extends FormRequest
{
    use LogTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->commonLog(
            (new StatusCode())::PRODUCT_LOG,
            "Incoming Product Params",
            request()->all()
        );

        return [
            "sku_code" => "required",
            "image"    => "required|image|mimes:jpg,png|max:5200",
            "title"    => "required",
            "price"    => "required",
            "details"  => "required",
            "status"   => "required",
        ];
    }
}
