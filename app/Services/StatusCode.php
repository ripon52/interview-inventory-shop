<?php

namespace App\Services;

class StatusCode
{

    public const PRODUCT_LOG = "productsLog";
    public const ERROR_LOG   = "errorBoard";

    public const TRUE  = true;
    public const FALSE = false;

    public const SUCCESS = 200;
    public const SUCCESS_WITH_DATA = 201;
    public const VALIDATION_ERROR = 405;
    public const INTERNAL_ERROR   = 500;
    public const RESTRICTED_ERROR = 500;

    public const PRODUCT_STORE_MESSAGE = "Successfully! New Product saved";
    public const PRODUCT_UPDATE_MESSAGE = "Successfully! Product Record Updated";
    public const PRODUCT_DELETE_MESSAGE = "Successfully! Product Record Deleted";
    public const ROUTE_RESTRICTED_MESSAGE = "Sorry, You are not allowed to proceed the action.";
}
