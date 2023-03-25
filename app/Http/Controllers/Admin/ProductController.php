<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\StatusCode;
use App\Traits\FileTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\LogTrait;
class ProductController extends Controller
{
    use LogTrait, FileTrait;
    public $products;
    public $statusCode;
    public $productService;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->statusCode     = new StatusCode();
        $this->products       = (new ProductService())->getAll();
    }


    public function index()
    {
        $data['products'] = $this->products;


        return view("admin.products.index")->with($data);
    }

    public function create()
    {

        return view("admin.products.new-product");
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = $this->productService->storeProduct($request->except("image"));

            if($request->hasFile("image")){

                $data["original_image"] = self::FileProcessing(
                    $request->file("image"),
                    $this->productService::PRODUCT_ORIGINAL_IMAGE);

                $data["thumbnail"] = self::FileProcessing(
                    $request->file("image"),
                    $this->productService::THUMBNAIL,
                    100,120
                );

                $product->update($data);
            }

            DB::commit();

            $this->commonLog(
                $this->statusCode::PRODUCT_LOG,
                $this->statusCode::PRODUCT_STORE_MESSAGE,
                $product
            );

            flashMessage("success", $this->statusCode::PRODUCT_STORE_MESSAGE);

            return $this->apiResponse(
                $this->statusCode::TRUE,
                $this->statusCode::SUCCESS_WITH_DATA,
                $this->statusCode::PRODUCT_STORE_MESSAGE,
                view("admin.products.ajax.ajax-products")
                    ->with(["products" => $this->productService->getAll()])->render()
            );
        }
        catch (\Throwable $e){
            DB::rollBack();
            dd($e);
            $this->errorLog($e,"Opps! Product Store Errors.");
        }

    }

    public function edit(Request $request,$id)
    {
        $data['product'] = $this->productService->findById($id);
        if ($request->ajax()){

            return $this->apiResponse(
                $this->statusCode::TRUE,
                $this->statusCode::SUCCESS_WITH_DATA,
                $this->statusCode::PRODUCT_STORE_MESSAGE,
                $data['product']
            );
        }


        return view("admin.products.edit-product")->with($data);
    }

    public function update(ProductUpdateRequest $request,$id)
    {
        if($request->ajax()){
            try {
                DB::beginTransaction();

                $product = $this->productService->updateProduct($id,$request->except("image"));

                if($request->hasFile("image")){

                    $data["original_image"] = self::FileProcessing(
                        $request->file("image"),
                        $this->productService::PRODUCT_ORIGINAL_IMAGE);


                    $data["thumbnail"] = self::FileProcessing(
                        $request->file("image"),
                        $this->productService::THUMBNAIL,
                        100,120
                    );

                    $product->update($data);
                }

                DB::commit();

                $this->commonLog(
                    $this->statusCode::PRODUCT_LOG,
                    $this->statusCode::PRODUCT_UPDATE_MESSAGE,
                    $product
                );

                flashMessage("success", $this->statusCode::PRODUCT_STORE_MESSAGE);

                return $this->apiResponse(
                    $this->statusCode::TRUE,
                    $this->statusCode::SUCCESS_WITH_DATA,
                    $this->statusCode::PRODUCT_STORE_MESSAGE,
                    view("admin.products.ajax.ajax-products")
                        ->with(["products" => $this->productService->getAll()])->render()
                );
            }
            catch (\Throwable $e){
                DB::rollBack();
                $this->errorLog($e,"Opps! Product Store Errors.");
                ddError($e);
            }
        }

    }

    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $this->productService->deleteProduct($id);
            DB::commit();

            return $this->apiResponse(
                $this->statusCode::TRUE,
                $this->statusCode::SUCCESS_WITH_DATA,
                $this->statusCode::PRODUCT_DELETE_MESSAGE,
                // $this->products
                view("admin.products.ajax.ajax-products")
                    ->with(["products" => $this->productService->getAll()])->render()
            );
        }
        catch (\Throwable $e){
            DB::rollBack();
            $this->errorLog($e,"Opps! Product Store Errors.");
            ddError($e);
        }
    }


}
