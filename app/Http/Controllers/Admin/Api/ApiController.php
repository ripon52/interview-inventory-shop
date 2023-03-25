<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use App\Services\StatusCode;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public $productService;
    public $statusCode;
    public function __construct()
    {
        $this->productService = new ProductService();
        $this->statusCode     = new StatusCode();
    }

    public function getProducts()
    {

        return $this->apiResponse(
          $this->statusCode::TRUE,
          $this->statusCode::SUCCESS_WITH_DATA,
          "Products List",
          $this->productService->getAll($this->statusCode::TRUE)
        );
    }
}
