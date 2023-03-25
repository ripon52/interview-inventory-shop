<?php

namespace App\Http\Requests\Admin\Product;

use App\Services\StatusCode;
use App\Traits\LogTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductUpdateRequest extends FormRequest
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
        $id = $this->product;

        $this->commonLog(
            (new StatusCode())::PRODUCT_LOG,
            "Incoming Product Updating Params",
            request()->all()
        );

        return [
            "sku_code" => ["required",Rule::unique("products")->ignore($id)],
            "title"    => "required",
            "price"    => "required",
            "details"  => "required",
            "status"   => "required",
            "image"    => "nullable",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $statusCode = new StatusCode();

        $error_bags = [
            "status"  =>$statusCode::FALSE,
            "code"    =>$statusCode::VALIDATION_ERROR,
            "message" => "Opps! Product Update Failed",
            "data"    => $validator->errors()->getMessageBag(),
            "optional"=>null,
        ];

     //   $this->errorLog($error_bags,null,"Opps! Product Update Failed");

        throw new HttpResponseException(response()->json($error_bags));
    }
}
